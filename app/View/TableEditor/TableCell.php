<?php

namespace App\View\TableEditor;

class TableCell
{
    /** @var TableColumn */
    protected $column;
    /** @var mixed */
    protected $value;

    public function __construct(TableColumn $column, $value)
    {
        $this->column = $column;
        $this->value = $value;
    }

    public function code()
    {
        return $this->column->code();
    }

    public function value()
    {
        return $this->value;
    }
}
