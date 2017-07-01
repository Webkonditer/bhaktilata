<?php
declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

trait Uuids
{
    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $key = $model->getKeyName();
            $model->{$key} = $model->{$key} ?: Uuid::generate()->string;
        });
    }
}