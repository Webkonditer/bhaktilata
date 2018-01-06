<?php

namespace App\View\TableEditor;

class TableRow
{
    /** @var TableCell[] */
    private $cells;
    /** @var mixed */
    private $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function addCell(TableCell $cell)
    {
        $this->cells[$cell->code()] = $cell;
    }

    public function cells()
    {
        return $this->cells;
    }

    public function getItem()
    {
        return $this->item;
    }
}