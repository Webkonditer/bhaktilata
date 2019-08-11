<?php

namespace App\View\TableEditor;

class TableColumn
{
    /** @var string */
    private $caption;
    /** @var string */
    private $code;
    /** @var TableColumnParameters */
    private $parameters;

    public function __construct(string $code, string $caption, TableColumnParameters $parameters = null)
    {
        $this->code = $code;
        $this->caption = $caption;
        $this->parameters = $parameters;
    }

    public function code(): string
    {
        return $this->code;
    }

    public function caption(): string
    {
        return $this->caption;
    }

    /**
     * @return TableColumnParameters
     */
    public function parameters(): TableColumnParameters
    {
        return $this->parameters ?: new TableColumnParameters();
    }

    public function createCell($value): TableCell
    {
        return new TableCell($this, $value);
    }
}
