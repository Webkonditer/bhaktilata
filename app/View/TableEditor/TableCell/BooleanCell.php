<?php

namespace App\View\TableEditor\TableCell;

use App\View\TableEditor\TableCell;
use App\View\TableEditor\TableColumn;

class BooleanCell extends TableCell
{
    /** @var string */
    private $trueText;
    /** @var string */
    private $falseText;

    public function __construct(TableColumn $column, $value, $trueText = 'Да', $falseText = 'Нет')
    {
        parent::__construct($column, $value);
        $this->trueText = $trueText;
        $this->falseText = $falseText;
    }


    public function value()
    {
        return $this->value ? $this->trueText : $this->falseText;
    }
}
