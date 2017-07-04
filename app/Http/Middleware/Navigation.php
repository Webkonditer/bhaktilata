<?php
declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as BaseTrimmer;

class Navigation extends BaseTrimmer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @param array                     $attributes
     *
     * @return mixed
     */
    public function handle($request, \Closure $next, ...$attributes)
    {
        \Menu::make('main', function ($menu) {
            $menu->add('Главная', ['route' => 'main']);
            $menu->add('Курсы', ['route' => 'courses'])->nickname('courses');
            $repo = app()->make('App\Repositories\CourseCategoryRepository');
            foreach ($repo->all() as $category) {
                $menu->courses
                    ->add($category->title, ['route' => ['courses.category', 'course_category_slug' => $category->slug]])
                    ->active(route('courses.category', ['course_category_slug' => $category->slug], false) . '/*');
            }
        });
        return $next($request);
    }
}
