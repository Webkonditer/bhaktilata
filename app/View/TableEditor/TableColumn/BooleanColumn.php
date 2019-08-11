<?php

namespace App\View\TableEditor\TableColumn;

use App\View\TableEditor\TableCell;
use App\View\TableEditor\TableColumn;

class BooleanColumn extends TableColumn
{
    public function createCell($value): TableCell
    {
        return new TableCell\BooleanCell($this, $value);
    }
}