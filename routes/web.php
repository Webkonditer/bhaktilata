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

        $router->get('/{project_category_slugs}/project/{project_slug}', 'ProjectController@project')
            ->name('projects.project')
            ->where('project_category_slugs', '^[a-zA-Z\/-](?!project).+');

        $router->get('/{project_category_slugs}', 'ListController@category')
            ->name('projects.category')
            ->where('project_category_slugs', '^[a-zA-Z\/-](?!project).+');
    });


    $router->get('forms/ok', '\App\Forms\Http\Controllers\SimpleFormController@success')->name('simple.form.ok');
    $router->post('forms/{code}', '\App\Forms\Http\Controllers\SimpleFormController@store')->name('simple.form.store');

    $router->get('{page_path}', 'PagesController@index')
        ->name('page')
        ->where('page_path', '(?!admin|login)(.+)');
});

$router->middleware('auth')->prefix('/admin')->namespace('Admin')->group(function() use ($router) {
    $router->get('/dashboard', 'DashboardController@index')->name('admin.dashboard');

    $router->get('/courses', 'Courses\ListController@index')->name('admin.courses.list');
    $router->get('/courses/add', 'Courses\CourseController@add')->name('admin.course.add');
    $router->get('/courses/{course}/edit', 'Courses\CourseController@edit')->name('admin.course.edit');
    $router->post('/courses/{course}/store', 'Courses\CourseController@store')->name('admin.course.store');
    $router->get('/courses/{course}/delete', 'Courses\CourseController@delete')->name('admin.course.delete');

    $router->get('/courses/categories', 'Courses\CategoriesListController@index')->name('admin.courses.categories.list');
    $router->get('/courses/categories/add', 'Courses\CategoryController@add')->name('admin.course.category.add');
    $router->get('/courses/categories/{category}/edit', 'Courses\CategoryController@edit')->name('admin.course.category.edit');
    $router->post('/courses/categories/{category}/store', 'Courses\CategoryController@store')->name('admin.course.category.store');
    $router->get('/courses/categories/{category}/delete', 'Courses\CategoryController@delete')->name('admin.course.category.delete');

    $router->get('/projects', 'Projects\ListController@index')->name('admin.projects.list');
    $router->get('/projects/add', 'Projects\ProjectController@add')->name('admin.project.add');
    $router->get('/projects/{project}/edit', 'Projects\ProjectController@edit')->name('admin.project.edit');
    $router->post('/projects/{project}/store', 'Projects\ProjectController@store')->name('admin.project.store');
    $router->get('/projects/{project}/delete', 'Projects\ProjectController@delete')->name('admin.project.delete');

    $router->get('/projects/categories', 'Projects\CategoriesListController@index')->name('admin.projects.categories.list');
    $router->get('/projects/categories/add', 'Projects\CategoryController@add')->name('admin.project.category.add');
    $router->get('/projects/categories/{category}/edit', 'Projects\CategoryController@edit')->name('admin.project.category.edit');
    $router->post('/projects/categories/{category}/store', 'Projects\CategoryController@store')->name('admin.project.category.store');
    $router->get('/projects/categories/{category}/delete', 'Projects\CategoryController@delete')->name('admin.project.category.delete');

    $router->get('/pages', 'Pages\ListController@index')->name('admin.pages.list');
    $router->get('/pages/add', 'Pages\PageController@add')->name('admin.pages.add');
    $router->get('/pages/{page}/edit', 'Pages\PageController@edit')->name('admin.page.edit');
    $router->post('/pages/{page}/store', 'Pages\PageController@store')->name('admin.page.store');
    $router->get('/pages/{page}/delete', 'Pages\PageController@delete')->name('admin.page.delete');
});

Auth::routes();
