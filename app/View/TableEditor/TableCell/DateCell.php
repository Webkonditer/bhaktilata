<?php

namespace App\View\TableEditor\TableCell;

use App\View\TableEditor\TableCell;
use App\View\TableEditor\TableColumn;

class DateCell extends TableCell
{
    /** @var string */
    private $toFormat;
    /** @var string */
    private $fromFormat;

    public function __construct(TableColumn $column, $value, $toFormat = 'd.m.Y', $fromFormat = 'Y-m-d')
    {
        parent::__construct($column, $value);
        $this->toFormat = $toFormat;
        $this->fromFormat = $fromFormat;
    }


    public function value()
    {
        if (!$this->value) {
            return '';
        }
        if (!$this->value instanceof \DateTime) {
            $this->value = \DateTime::createFromFormat($this->fromFormat, $this->value);
        }
        return $this->value instanceof \DateTime ?
            $this->value->format($this->toFormat) :
            '';
    }
}
