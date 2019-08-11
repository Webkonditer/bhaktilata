<?php

namespace App\Schedule;

use Illuminate\Database\Eloquent\Model;

class CourseList extends Model
{
  public function schedules() {
    return $this->hasMany('App\Schedule\Schedule','course_id','id');
  }
}
