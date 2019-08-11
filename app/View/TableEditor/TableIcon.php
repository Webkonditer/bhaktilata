<?php

namespace App\View\TableEditor;

class TableIcon
{
    /** @var string */
    private $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function render()
    {
        return "<i class=\"icon glyphicon glyphicon-{$this->type}\"></i>";
    }
}