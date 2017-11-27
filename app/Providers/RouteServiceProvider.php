<?php

namespace App\Providers;

use App\Course;
use App\Projects\ProjectCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        $repo = app()->make('App\Repositories\ProjectCategoryRepository');
        Route::bind('project_category_slugs', function ($projectCategorySlug) use ($repo) {
            $slugs = explode('/', $projectCategorySlug);
            $categories = collect();
            $categories->push($prevCategory = $lastCategory = $repo->findBySlug(array_pop($slugs)));
            while($slug = array_pop($slugs)) {
                $category = $repo->findBySlug($slug);
                if ($prevCategory->parent->id != $category->id) {
                    throw (new ModelNotFoundException)->setModel(ProjectCategory::class);
                }
                $categories->push($prevCategory = $category);
            }
            return $categories->reverse();
        });
        $repo = app()->make('App\Repositories\ProjectRepository');
        Route::bind('project_slug', function ($projectSlug) use ($repo) {
            return $repo->findBySlug($projectSlug);
        });

        $repo = app()->make('App\Repositories\PageRepository');
        Route::bind('page_path', function ($path) use ($repo) {
            return $repo->findByPath('/' . $path);
        });

        $repo = app()->make('App\Repositories\NewsRepository');
        Route::bind('news_code', function ($newsSlug) use ($repo) {
            return $repo->findBySlug($newsSlug);
        });

        Route::bind('page_number', function ($pageNumber) use ($repo) {
            $page = (int)str_replace('page', '', $pageNumber);
            return  $page > 0 ? $page : 1;
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
