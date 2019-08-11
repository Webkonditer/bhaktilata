<?php

namespace App\View\TableEditor;

class TableColumnParameters
{
    /** @var mixed */
    private $width;

    public function __construct()
    {
    }

    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    public function getWidth()
    {
        return $this->width;
    }
}