<?php

namespace App\Schedule;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function courselist() {
      return $this->belongsTo('App\Schedule\CourseList','course_id','id');
    }

  /*protected $casts = [
    'options' => 'contacts',
    'options' => 'teacher',
  ];*/
}
