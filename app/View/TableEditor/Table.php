<?php

namespace App\View\TableEditor;

class Table
{
    /** @var TableRow[] */
    private $rows;
    /** @var TableColumn[] */
    private $columns;
    /** @var TableActionButton[] */
    private $actions;

    public function addColumn(TableColumn $column)
    {
        $this->columns[] = $column;
    }

    public function columns()
    {
        return $this->columns;
    }

    public function addRow(TableRow $row)
    {
        $this->rows[] = $row;
    }

    public function rows()
    {
        return $this->rows;
    }

    public function addAction(TableActionButton $action)
    {
        $this->actions[] = $action;
    }

    public function actions()
    {
        return $this->actions;
    }

    public function render($parameters = [])
    {
        return view('table-editor.table', array_merge($parameters, [
            'table' => $this,
        ]));
    }
}
