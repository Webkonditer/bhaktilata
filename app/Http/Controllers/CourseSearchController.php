<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\CardOfCourse;
use App\teacher;

class CourseSearchController extends Controller
{

  public function audiences($id)
  {
    $a[1] = 'Совсем начинающие';
    $a[2] = 'До первой инициации';
    $a[3] = 'До второй инициации';
    $a[4] = 'После второй инициации';
    $a[5] = 'Лидеры';

    return $a[$id];
  }

  public function topics($id)
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
    $l[21] = 'Социальное образование';
    $l[22] = 'Семейное образование';

    return $l[$id];
  }

  public function durations($id)
  {
    $l[1] = 'Пара дней';
    $l[18] = 'Клубный формат (без сроков)';
    $l[3] = 'Месяц';
    $l[4] = '1,5 месяца';
    $l[5] = '2 месяца';
    $l[6] = '3 месяца';
    $l[7] = '4 месяца';
    $l[8] = '5 месяцев';
    $l[9] = '6 месяцев';
    $l[10] = '7 месяцев';
    $l[11] = '8 месяцев';
    $l[12] = '9 месяцев';
    $l[13] = '10 месяцев';
    $l[15] = '11 месяцев';
    $l[16] = '12 месяцев';
    $l[17] = 'Больше года';

    return $l[$id];
  }

  public function formats($id)
  {
    $a[1] = 'Онлайн (с сопровождением)';
    $a[2] = 'Онлайн (без сопровождения)';
    $a[3] = 'Очный';
    $a[4] = 'Материалы для скачивания';

    return $a[$id];
  }

  public function out($CardOfCourses)
  {

    foreach ($CardOfCourses as $CardOfCourse) {

        $arrey[$CardOfCourse->id]['image'] = $CardOfCourse->picture;
        $arrey[$CardOfCourse->id]['title'] = $CardOfCourse->title;
        $arrey[$CardOfCourse->id]['description'] = $CardOfCourse->description;

        $t = explode("|", $CardOfCourse->topics);
        $topics = '';
        foreach ($t as $value) {
            $topics = $topics.$this->topics($value).'; ';
        }
        $arrey[$CardOfCourse->id]['topics'] = $topics;

        $a = explode("|", $CardOfCourse->audience);
        $audiences = '';
        foreach ($a as $value) {
            $audiences = $audiences.$this->audiences($value).'; ';
        }
        $arrey[$CardOfCourse->id]['audiences'] = $audiences;

        $tch = explode("|", $CardOfCourse->teacher);
        $teachers = teacher::orderBy('id', 'asc')->whereIn('id',$tch)->get();
        $teach = '';
        foreach ($teachers as $teacher) {
            $teach = $teach.$teacher->name.'; ';
        }
        $arrey[$CardOfCourse->id]['teachers'] = $teach;

        $arrey[$CardOfCourse->id]['date_start'] = $CardOfCourse->date_start;

        $d = explode("|", $CardOfCourse->duration);
        $durations = '';
        foreach ($d as $value) {
            $durations = $durations.$this->durations($value).'; ';
        }
        $arrey[$CardOfCourse->id]['durations'] = $durations;

        $f = explode("|", $CardOfCourse->format);
        $formats = '';
        foreach ($f as $value) {
            $formats = $formats.$this->formats($value).'; ';
        }
        $arrey[$CardOfCourse->id]['formats'] = $formats;

        $arrey[$CardOfCourse->id]['course_link'] = $CardOfCourse->course_link;
    }

    if(isset($arrey)) return $arrey;
    else return;
  }

  public function index()
  {
    $CardOfCourses = CardOfCourse::orderBy('id', 'asc')->get();

    return view('public.card_of_courses.index', [
      'cards' => $this->out($CardOfCourses),
      'audiences' => array(),
      'topics' => array(),
      'durations' => array(),
      'formats' => array(),
    ]);
  }

  public function search(Request $request)//Расширенный фильтр
  {
    if(isset($request->filter2)){

      $validator = Validator::make($request->all(), [
        'topic' => 'required|array',
        'audience' => 'required|array',
        'format' => 'required|array',
        'duration' => 'required|array',
      ],
      [
        'topic.required' => 'Вы забыли поставить галочку в разделе Темы.',
        'audience.required' => 'Вы забыли поставить галочку в разделе Аудитория.',
        'format.required' => 'Вы забыли поставить галочку в разделе Формат.',
        'duration.required' => 'Вы забыли поставить галочку в разделе Длительность.',
      ]);
      if ($validator->fails()) {
        return back()->withInput()->withErrors($validator->errors());
      }

      //Фильтр по темам
      $CardOfCourses = CardOfCourse::orderBy('id', 'asc')->get();
      foreach ($request->topic as $key => $value) {
          $topics[] = $key;
      }
      $filters_t = array();
      foreach ($CardOfCourses as $CardOfCourse) {
        foreach ($topics as $topic) {
          if(strstr($CardOfCourse->topics, (string)$topic)){
            $filters_t[] = $CardOfCourse;
          }
        }
      }
      $filters_t = array_unique($filters_t);

      //Фильтр по аудитории
      foreach ($request->audience as $key => $value) {
          $audiences[] = $key;
      }
      $filters_a = array();
      foreach ($filters_t as $filter_t) {
        foreach ($audiences as $audience) {
          if(strstr($filter_t->audience, (string)$audience)){
            $filters_a[] = $filter_t;
          }
        }
      }
      $filters_a = array_unique($filters_a);

      //Фильтр по формату
      foreach ($request->format as $key => $value) {
          $formats[] = $key;
      }
      $filters_f = array();
      foreach ($filters_a as $filter_a) {
        foreach ($formats as $format) {
          if(strstr($filter_a->format, (string)$format)){
            $filters_f[] = $filter_a;
          }
        }
      }
      $filters_f = array_unique($filters_f);

      //Фильтр по длительности
      foreach ($request->duration as $key => $value) {
          $durs[] = $key;
      }

      foreach ($durs as $dur) {
        if($dur == 1) $durations[] = 1;
        if($dur == 2) $durations[] = 3;
        if($dur == 3) {$durations[] = 4;$durations[] = 5;$durations[] = 6;$durations[] = 7;}
        if($dur == 4) {$durations[] = 8;$durations[] = 9;$durations[] = 10;$durations[] = 11;$durations[] = 12;$durations[] = 13;$durations[] = 14;$durations[] = 15;$durations[] = 16;}
        if($dur == 5) $durations[] = 17;
        if($dur == 6) $durations[] = 18;
      }
      $durations = array_unique($durations);

      $filters_d = array();
      foreach ($filters_f as $filter_f) {
        foreach ($durations as $duration) {
          if(strstr($filter_f->duration, (string)$duration)){
            $filters_d[] = $filter_f;
          }
        }
      }
      $filters_d = array_unique($filters_d);

      return view('public.card_of_courses.index', [
        'cards' => $this->out($filters_d),
        'topics' => $topics,
        'audiences' => $audiences,
        'formats' => $formats,
        'durations' => $durs,
        'filter2' => 1,
      ]);
    }
    else{
      $validator = Validator::make($request->all(), [
        'audience' => 'required|array',
      ],
      [
        'audience.required' => 'Вы забыли поставить галочку в разделе Аудитория.',
      ]);

      if ($validator->fails()) {
        return back()->withInput()->withErrors($validator->errors());
      }

      foreach ($request->audience as $key => $value) {
          $audiences[] = $key;
      }

      $CardOfCourses = CardOfCourse::orderBy('id', 'asc')->get();

      $response = array();
      foreach ($CardOfCourses as $CardOfCourse) {
        foreach ($audiences as $audience) {
          if(strstr($CardOfCourse->audience, (string)$audience)){
            $response[] = $CardOfCourse;
          }
        }
      }
      $response = array_unique($response);

      return view('public.card_of_courses.index', [
        'cards' => $this->out($response),
        'audiences' => $audiences,
        'topics' => array(),
        'durations' => array(),
        'formats' => array(),
      ]);
    }
  }
}
