<?php

use Illuminate\Database\Seeder;

class ProjectsAndCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$projectsCategories = [
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
    	foreach ($projectsCategories as $categoryData) {
    		$category = new \App\Projects\ProjectCategory($categoryData);
    		$category->save();
    		$categoryIds[] = $category->id;
	    }
        $projects = [
        	[
	            'status' => 'published',
		        'slug' => 'test-project',
		        'title' => 'Тестовый проект',
                'link' => 'http://ya.ru',
		        'category_id' => $categoryIds[0],
	        ],
            [
                'status' => 'published',
                'slug' => 'one-more-project',
                'title' => 'Ещё проект',
                'is_opened' => false,
                'category_id' => $categoryIds[0],
            ],
            [
                'status' => 'published',
                'slug' => 'new-project',
                'title' => 'Новый проект',
                'is_opened' => true,
                'category_id' => $categoryIds[1],
            ],
        ];
    	foreach ($projects as $course) {
    		$course = new \App\Projects\Project($course);
    		$course->save();
	    }
    }
}
