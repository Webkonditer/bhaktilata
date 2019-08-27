<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OnlineCourse;
use App\teacher;

class FrontOnlineCoursesController extends Controller
{
  public function index(OnlineCourse $onlinecourse)
  {
    $l[1] = 'Общая картина самбандхи';
    $l[2] = 'Видение мира сквозь призму бхакти';
    $l[3] = 'Бхагавад-гита';
    $l[4] = 'Шримад Бхагаватам';
    $l[5] = 'Чайтанья Чаритамрита';
    $l[6] = 'Бхакти-шастры';
    $l[7] = 'Другие книги';
    $l[8] = 'Личность Шрилы Прабхупады';
    $l[9] = 'Предыдущие Ачарьи';
    $l[10] = 'Организация';
    $l[11] = 'Духовные учителя';
    $l[12] = 'Общество преданных';
    $l[13] = 'Святое имя';
    $l[14] = 'Поклонение Божествам';
    $l[15] = 'Осознанная практика';
    $l[16] = 'Другие анги';
    $l[17] = 'Простая жизнь';
    $l[18] = 'Этикет и распорядок жизни';
    $l[19] = 'Духовное лидерство';
    $l[20] = 'Управление и организация';
    $l[21] = 'Социальное и семейное образование' ;
    $m = explode("|", $onlinecourse->topics);
    $topics = '';
    foreach ($m as $value) {
        $topics = $topics.$l[$value].'; ';
    }

    $a[1] = 'Совсем начинающие';
    $a[2] = 'До первой инициации';
    $a[3] = 'До второй инициации';
    $a[4] = 'После второй инициации';
    $a[5] = 'Лидеры';
    $n = explode("|", $onlinecourse->audience);
    $audience = '';
    foreach ($n as $value) {
        $audience = $audience.$a[$value].'; ';
    }

    $t = explode("|", $onlinecourse->teacher);


    return view('public.online_courses.index', [
      'onlinecourse' => $onlinecourse,
      'topics' => $topics,
      'audience' => $audience,
      'teachers' => teacher::orderBy('id', 'asc')->whereIn('id',$t)->get(),
    ]);
  }
}
