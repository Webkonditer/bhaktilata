<?php

namespace App\Repositories;

trait PageableTrait
{
    public function paginate($query, $page, $perPage)
    {
        return $query->skip($perPage * ($page - 1))->take($perPage);
    }
}