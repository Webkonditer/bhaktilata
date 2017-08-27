<?php

namespace App\Common;

use App\Uuids;
use Illuminate\Database\Eloquent\Model as EloquentModel;

abstract class Model extends EloquentModel
{
    use Uuids;

    public $incrementing = false;
}