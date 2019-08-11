<?php

namespace App\View;

use Illuminate\Pagination\LengthAwarePaginator;

class Paginator extends LengthAwarePaginator
{
    private $routeName = '';

    public function url($page)
    {
        if (!$this->routeName) {
            return parent::url($page);
        }
        $parameters = [];
        if ($page > 1) {
            $parameters = [$this->pageName => 'page' . $page];
        }


        if (count($this->query) > 0) {
            $parameters = array_merge($this->query, $parameters);
        }

        return route($this->routeName, $parameters);
    }

    public function setRoute($route)
    {
        $this->routeName = $route;
        return $this;
    }
}