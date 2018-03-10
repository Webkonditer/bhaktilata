<?php

namespace App\View\Admin\Courses;

use App\Domain\Courses\CourseEvent;
use App\View\TableEditor\Table;
use App\View\TableEditor\TableActionButton;
use App\View\TableEditor\TableColumn;
use App\View\TableEditor\TableColumnParameters;
use App\View\TableEditor\TableIcon;
use App\View\TableEditor\TableRow;

class EventsListTable
{
    const PER_PAGE = 30;
    /** @var Table */
    private $table = null;
    /** @var CourseEvent[] */
    private $courseEvents;
    /** @var TableColumn[] */
    private $columns;

    public function __construct($newsItems)
    {
        $this->courseEvents = $newsItems;
    }

    public function render()
    {
        return view('table-editor.page', [
            'table' => $this->table(),
            'paging' => $this->courseEvents,
            'addAction' => ['route' => route('admin.courses.events.add'), 'text' => 'Добавить занятие'],
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
            'published' => new TableColumn\BooleanColumn('published', 'Вкл.', (new TableColumnParameters())->setWidth('65px')),
            'title' => new TableColumn('title', 'Заголовок'),
            'date_start' => new TableColumn\DateColumn('date_start', 'Начало', (new TableColumnParameters())->setWidth('175px')),
            'date_end' => new TableColumn\DateColumn('date_end', 'Окончание', (new TableColumnParameters())->setWidth('175px')),
            'location' => new TableColumn('location', 'Место проведения'),
            'teacher' => new TableColumn('teacher', 'Ведущий'),
            'is_opened' => new TableColumn\BooleanColumn('is_opened', 'Открыта запись', (new TableColumnParameters())->setWidth('65px')),
        ];
        $table->addColumn($this->columns['published']);
        $table->addColumn($this->columns['title']);
        $table->addColumn($this->columns['date_start']);
        $table->addColumn($this->columns['date_end']);
        $table->addColumn($this->columns['location']);
        $table->addColumn($this->columns['teacher']);
        $table->addColumn($this->columns['is_opened']);
        $table->addAction(new TableActionButton(function (TableRow $row, array $parameters = []) {
            return route('admin.courses.events.edit', ['courseEvent' => $row->getItem()]);
        }, new TableIcon('pencil')));
        $table->addAction(new TableActionButton(function (TableRow $row, array $parameters = []) {
            return route('admin.courses.events.delete', ['courseEvent' => $row->getItem()]);
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
        foreach ($this->courseEvents as $event) {
            /** @var CourseEvent $event */
            $row = new TableRow($event);
            $row->addCell($this->columns['published']->createCell($event->isPublished()));
            $row->addCell($this->columns['title']->createCell($event->title));
            $row->addCell($this->columns['date_start']->createCell($event->date_start));
            $row->addCell($this->columns['date_end']->createCell($event->date_end));
            $row->addCell($this->columns['location']->createCell($event->location));
            $row->addCell($this->columns['teacher']->createCell($event->teacher));
            $row->addCell($this->columns['is_opened']->createCell($event->is_opened));
            $table->addRow($row);
        }
        return $table;
    }

}
