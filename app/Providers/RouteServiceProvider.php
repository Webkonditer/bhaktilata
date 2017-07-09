<?php

namespace App\Providers;

use App\Course;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $repo = app()->make('App\Repositories\CourseRepository');
        Route::bind('course_slug', function ($courseSlug) use ($repo) {
            return $repo->findBySlug($courseSlug);
        });
        Route::bind('course', function ($courseId) use ($repo) {
            return $repo->findById($courseId);
        });
        $repo = app()->make('App\Repositories\CourseCategoryRepository');
        Route::bind('course_category_slug', function ($courseSlug) use ($repo) {
            return $repo->findBySlug($courseSlug);
        });
        $repo = app()->make('App\Repositories\ProjectRepository');
        Route::bind('project_slug', function ($projectSlug) use ($repo) {
            return $repo->findBySlug($projectSlug);
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
