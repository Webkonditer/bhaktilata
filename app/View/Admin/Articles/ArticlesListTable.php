<?php

namespace App\View\Admin\Articles;

use App\Domain\Articles\Article;
use App\View\TableEditor\Table;
use App\View\TableEditor\TableActionButton;
use App\View\TableEditor\TableColumn;
use App\View\TableEditor\TableColumnParameters;
use App\View\TableEditor\TableIcon;
use App\View\TableEditor\TableRow;

class ArticlesListTable
{
    const PER_PAGE = 30;
    /** @var Table */
    private $table = null;
    /** @var Article[] */
    private $articles;
    /** @var TableColumn[] */
    private $columns;

    public function __construct($articles)
    {
        $this->articles = $articles;
    }

    public function render()
    {
        return view('table-editor.page', [
            'table' => $this->table(),
            'paging' => $this->articles,
            'addAction' => ['route' => route('admin.articles.add'), 'text' => 'Добавить статью'],
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
            'author' => new TableColumn('author', 'Автор'),
        ];
        $table->addColumn($this->columns['published']);
        $table->addColumn($this->columns['slug']);
        $table->addColumn($this->columns['date']);
        $table->addColumn($this->columns['title']);
        $table->addColumn($this->columns['author']);
        $table->addAction(new TableActionButton(function (TableRow $row, array $parameters = []) {
            return route('admin.articles.edit', ['article' => $row->getItem()]);
        }, new TableIcon('pencil')));
        $table->addAction(new TableActionButton(function (TableRow $row, array $parameters = []) {
            return route('admin.articles.delete', ['article' => $row->getItem()]);
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
        foreach ($this->articles as $item) {
            /** @var Article $item */
            $row = new TableRow($item);
            $row->addCell($this->columns['published']->createCell($item->isPublished()));
            $row->addCell($this->columns['slug']->createCell($item->slug));
            $row->addCell($this->columns['date']->createCell($item->date));
            $row->addCell($this->columns['title']->createCell($item->title));
            $row->addCell($this->columns['author']->createCell($item->author));
            $table->addRow($row);
        }
        return $table;
    }

}
