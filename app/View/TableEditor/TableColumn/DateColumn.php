<?php

namespace App\View\TableEditor\TableColumn;

use App\View\TableEditor\TableCell;
use App\View\TableEditor\TableColumn;

class DateColumn extends TableColumn
{
    public function createCell($value): TableCell
    {
        return new TableCell\DateCell($this, $value);
    }
}