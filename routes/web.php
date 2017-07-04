<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
})->name('main');

/** @var \Illuminate\Routing\Router $router */
$router->middleware('navigation')->namespace('Courses')->group(function() use ($router) {
	$router->get('/kursy', 'ListController@index')->name('courses');
	$router->get('/kursy/{course_category_slug}', 'ListController@category')->name('courses.category');
	$router->get('/kursy/{course_category_slug}/{course_slug}', 'CourseController@course')->name('courses.course');
});

$router->middleware('auth')->prefix('/admin')->namespace('Admin')->group(function() use ($router) {
    $router->get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    $router->get('/courses', 'Courses\ListController@index')->name('admin.courses.list');
    $router->get('/courses/{course}/edit', 'Courses\CourseController@edit')->name('admin.course.edit');
    $router->post('/courses/{course}/store', 'Courses\CourseController@store')->name('admin.course.store');
    $router->get('/courses/{course}/delete', 'Courses\CourseController@delete')->name('admin.course.delete');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
