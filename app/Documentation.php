<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    //use Notifiable;
    protected $fillable = [
      'title',
      'description',
      'link',
      'category',
    ];
}
