<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $courses = [
          [
              'id' => '1',
              'course' => 'Курс подготовки учителей, ступень 1',
          ],
          [
              'id' => '2',
              'course' => 'Курс подготовки учителей, ступень 2',
          ],
          [
              'id' => '3',
              'course' => 'Курс подготовки учителей, ступень 3',
          ],
          [
              'id' => '4',
              'course' => 'Курс подготовки учителей, ступень 4',
          ],
          [
              'id' => '5',
              'course' => 'Курс подготовки лидеров',
          ],
          [
              'id' => '6',
              'course' => 'Размышление над миссией',
          ],
          [
              'id' => '7',
              'course' => 'Базовый курс по наставничеству',
          ],
        
      ];
      foreach ($courses as $courseData) {
          $course = new \App\Schedule\CourseList($courseData);
          $course->save();
      }
    }
}
