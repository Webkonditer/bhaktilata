<?php

namespace App\View\TableEditor;

class TableActionButton
{
    /**
     * @var callable
     */
    private $routeCallback;
    /**
     * @var TableIcon
     */
    private $icon;

    public function __construct(Callable $routeCallback, TableIcon $icon)
    {
        $this->routeCallback = $routeCallback;
        $this->icon = $icon;
    }

    public function icon()
    {
        return $this->icon;
    }

    public function route($row, $parameters = [])
    {
        return call_user_func($this->routeCallback, $row, $parameters);
    }
}
