<?php

use Illuminate\Database\Seeder;

class CoursesAndCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$coursesCategories = [
    		[
    			'status' => 'published',
			    'slug' => 'test_category',
			    'title' => 'Тестовая категория',
		    ],
            [
                'status' => 'published',
                'slug' => 'another_test_category',
                'title' => 'Дргуая категория'
            ]
	    ];
    	$categoryIds = [];
    	foreach ($coursesCategories as $categoryData) {
    		$category = new \App\Courses\ProjectCategory($categoryData);
    		$category->save();
    		$categoryIds[] = $category->id;
	    }
        $courses = [
        	[
	            'status' => 'published',
		        'slug' => 'test-course',
		        'title' => 'Тестовый курс',
		        'category_id' => $categoryIds[0],
	        ],
            [
                'status' => 'published',
                'slug' => 'one-more-course',
                'title' => 'Ещё курс',
                'category_id' => $categoryIds[0],
            ],
            [
                'status' => 'published',
                'slug' => 'new-course',
                'title' => 'Новый курс',
                'category_id' => $categoryIds[1],
            ],
        ];
    	foreach ($courses as $course) {
    		$course = new \App\Courses\Course($course);
    		$course->save();
	    }
    }
}
