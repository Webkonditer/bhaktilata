<?php

namespace App\View\Admin\News;

use App\Domain\News\News;
use App\View\TableEditor\Table;
use App\View\TableEditor\TableActionButton;
use App\View\TableEditor\TableColumn;
use App\View\TableEditor\TableColumnParameters;
use App\View\TableEditor\TableIcon;
use App\View\TableEditor\TableRow;

class NewsListTable
{
    const PER_PAGE = 30;
    /** @var Table */
    private $table = null;
    /** @var News[] */
    private $newsItems;
    /** @var TableColumn[] */
    private $columns;

    public function __construct($newsItems)
    {
        $this->newsItems = $newsItems;
    }

    public function render()
    {
        return view('table-editor.page', [
            'table' => $this->table(),
            'paging' => $this->newsItems,
            'addAction' => ['route' => route('admin.news.add'), 'text' => 'Добавить новость'],
        ]);
    }

    private function table(): Table
    {
        return $this->table ?: $this->table = $this->setupTable();
    }

    /**
     * @return Table
     */
    private function setupTable(): Table
    {
        $table = new Table();
        $this->columns = [
            'published' => new TableColumn\BooleanColumn('published', 'Вкл.',
                (new TableColumnParameters())->setWidth('65px')),
            'slug' => new TableColumn('slug', 'Код', (new TableColumnParameters())->setWidth('175px')),
            'date' => new TableColumn\DateColumn('date', 'Дата', (new TableColumnParameters())->setWidth('175px')),
            'title' => new TableColumn('title', 'Заголовок'),
        ];
        $table->addColumn($this->columns['published']);
        $table->addColumn($this->columns['slug']);
        $table->addColumn($this->columns['date']);
        $table->addColumn($this->columns['title']);
        $table->addAction(new TableActionButton(function (TableRow $row, array $parameters = []) {
            return route('admin.news.edit', ['newsItem' => $row->getItem()]);
        }, new TableIcon('pencil')));
        $table->addAction(new TableActionButton(function (TableRow $row, array $parameters = []) {
            return route('admin.news.delete', ['newsItem' => $row->getItem()]);
        }, new TableIcon('remove')));

        $this->fillTable($table);

        return $table;
    }

    /**
     * @param Table $table
     *
     * @return Table
     */
    private function fillTable(Table $table): Table
    {
        foreach ($this->newsItems as $item) {
            /** @var News $item */
            $row = new TableRow($item);
            $row->addCell($this->columns['published']->createCell($item->isPublished()));
            $row->addCell($this->columns['slug']->createCell($item->slug));
            $row->addCell($this->columns['date']->createCell($item->date));
            $row->addCell($this->columns['title']->createCell($item->title));
            $table->addRow($row);
        }
        return $table;
    }

}
