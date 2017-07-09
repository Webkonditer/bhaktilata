<?php

/** @var \Illuminate\Routing\Router $router */
$router->middleware('navigation')->group(function($router) {
    /** @var \Illuminate\Routing\Router $router */
    $router->get('/', 'IndexController@index')->name('main');

    $router->namespace('Courses')->prefix('/courses')->group(function($router) {
        /** @var \Illuminate\Routing\Router $router */
        $router->get('', 'ListController@index')->name('courses');
        $router->get('/{course_category_slug}', 'ListController@category')->name('courses.category');
        $router->get('/{course_category_slug}/{course_slug}', 'CourseController@course')->name('courses.course');
    });

    $router->namespace('Projects')->prefix('/projects')->group(function($router) {
        /** @var \Illuminate\Routing\Router $router */
        $router->get('', 'ListController@index')->name('projects');
        $router->get('/{project_category_slugs}', 'ListController@category')
            ->name('projects.category')
            ->where('project_category_slug', '(.*)');
        $router->get('/{course_category_slug}/{project_slug}', 'ProjectsController@project')->name('projects.project');
    });

    $router->get('/about', 'PagesController@index');
    $router->get('/about/bhakti-lata-and-coskr', 'PagesController@index');
    $router->get('/about/program-and-vision', 'PagesController@index');
    $router->get('/about/stages', 'PagesController@index');
});

$router->middleware('auth')->prefix('/admin')->namespace('Admin')->group(function() use ($router) {
    $router->get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    $router->get('/courses', 'Courses\ListController@index')->name('admin.courses.list');
    $router->get('/courses/{course}/edit', 'Courses\CourseController@edit')->name('admin.course.edit');
    $router->post('/courses/{course}/store', 'Courses\CourseController@store')->name('admin.course.store');
    $router->get('/courses/{course}/delete', 'Courses\CourseController@delete')->name('admin.course.delete');
});
Auth::routes();
