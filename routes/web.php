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

    $router->get('{page_path}', 'PagesController@index')
        ->name('page')
        ->where('page_path', '(?!admin|login)(.+)');
});

$router->middleware('auth')->prefix('/admin')->namespace('Admin')->group(function() use ($router) {
    $router->get('/dashboard', 'DashboardController@index')->name('admin.dashboard');

    $router->get('/courses', 'Courses\ListController@index')->name('admin.courses.list');
    $router->get('/courses/{course}/edit', 'Courses\CourseController@edit')->name('admin.course.edit');
    $router->post('/courses/{course}/store', 'Courses\CourseController@store')->name('admin.course.store');
    $router->get('/courses/{course}/delete', 'Courses\CourseController@delete')->name('admin.course.delete');

    $router->get('/courses/categories', 'Courses\CategoriesListController@index')->name('admin.courses.categories.list');
    $router->get('/courses/categories/{category}/edit', 'Courses\CourseCategoryController@edit')->name('admin.course.category.edit');
    $router->post('/courses/categories/{category}/store', 'Courses\CourseCategoryController@store')->name('admin.course.category.store');
    $router->get('/courses/categories{category}/delete', 'Courses\CourseCategoryController@delete')->name('admin.course.category.delete');

    $router->get('/pages', 'Pages\ListController@index')->name('admin.pages.list');
    $router->get('/pages/add', 'Pages\PageController@add')->name('admin.pages.add');
    $router->get('/pages/{page}/edit', 'Pages\PageController@edit')->name('admin.page.edit');
    $router->post('/pages/{page}/store', 'Pages\PageController@store')->name('admin.page.store');
    $router->get('/pages/{page}/delete', 'Pages\PageController@delete')->name('admin.page.delete');
});

Auth::routes();
