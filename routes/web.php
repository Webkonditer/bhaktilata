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
});

/** @var \Illuminate\Routing\Router $router */
$router->namespace('Courses')->group(function() use ($router) {
	$router->get('/kursy', 'ListController@index');
	$router->get('/kursy/{course_category_slug}', 'ListController@category');
	$router->get('/kursy/{course_category_slug}/{course_slug}', 'CourseController@course');
});
