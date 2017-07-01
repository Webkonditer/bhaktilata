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
			    'title' => 'Test category',
		    ]
	    ];
    	$categoryId = null;
    	foreach ($coursesCategories as $categoryData) {
    		$category = new \App\Courses\CourseCategory($categoryData);
    		$category->save();
    		$categoryId = $category->id;
	    }
        $courses = [
        	[
	            'status' => 'published',
		        'slug' => 'test_course',
		        'title' => 'Test Course',
		        'category_id' => $categoryId,
	        ],
        ];
    	foreach ($courses as $course) {
    		$course = new \App\Courses\Course($course);
    		$course->save();
	    }
    }
}
