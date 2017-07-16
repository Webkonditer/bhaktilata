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
            $menu->add('О бхакти-лате', 'about')->nickname('about');
            $menu->about->add('Бхакти-лата и ЦОСКР', 'about/bhakti-lata-and-coskr');
            $menu->about->add('Программа и видение', 'about/program-and-vision');
            $menu->about->add('Ступени', 'about/stages');
            $menu->add('Проекты Бхакти-латы', 'projects')->nickname('projects');
            $repo = app()->make('App\Repositories\ProjectCategoryRepository');
            foreach ($repo->firstLevel() as $category) {
                $menu->projects
                    ->add($category->title,
                        ['route' => ['projects.category', 'project_category_slug' => $category->slug]])
                    ->active(route('projects.category', ['project_category_slug' => $category->slug], false) . '/*');
            }
            $menu->projects->add('Внеконфессиональная проповедь', '/projects/non-confessional-preaching');
            $menu->projects->add('Наставничество', '/projects/mentoring')->nickname('mentoring');
            $menu->projects->add('Философии и практика', '/projects/non-confessional-preaching');
            $menu->projects->add('Служение в миссии', '/projects/serving-mission');
            $menu->projects->add('Формирование общин', '/projects/community-building');
            $menu->projects->add('Формирование общин', '/projects/community-building');
            $menu->projects->add('Естественный образ жизни', '/projects/natural-living');
            $menu->projects->add('Требования к проектам Бхакти-латы', '/projects/requirements');
            $menu->add('Другие проекты', '/other-projects')->nickname('other_projects');

            $menu->other_projects->add('Партнеры Бхакти-латы', '/other-projects/partners');
            $menu->other_projects->add('Другие проекты, авторизованные отделом образования',
                '/other-projects/authorized');
            $menu->other_projects->add('Разработки в ятрах', '/other-projects/yatras');

            $menu->add('Курсы', ['route' => 'courses'])->nickname('courses');
            $repo = app()->make('App\Repositories\CourseCategoryRepository');
            foreach ($repo->published() as $category) {
                $menu->courses
                    ->add($category->title,
                        ['route' => ['courses.category', 'course_category_slug' => $category->slug]])
                    ->active(route('courses.category', ['course_category_slug' => $category->slug], false) . '/*');
            }
            $menu->add('Ресусры', '/resources')->nickname('resources');
            $menu->resources->add('Видео и вебинары', '/resources/video');
            $menu->resources->add('Документы', '/resources/documents');
            $menu->resources->add('Ссылки', '/resources/links');
            $menu->resources->add('Заказ книг', '/resources/books');
            $menu->add('Статьи и Новости', '/stati-i-novosti')->nickname('press');
            $menu->press->add('Новости', '/stati-i-novosti/novosti');
            $menu->press->add('Статьи', '/stati-i-novosti/stati');
            // TODO articles categories

            $menu->add('Онлайн-образование', 'http://gbc.bhaktilata.ru/');
            $menu->add('Сотрудничество и поддержка', '/cooperation-and-help')->nickname('help');
            $menu->help->add('Сотрудничество', '/cooperation-and-help/help');
            $menu->help->add('Пожертвования', '/cooperation-and-help/donation');
            $menu->add('В регионах', '/regions')->nickname('regions');
            $menu->regions->add('Бхакти-лата в общинах', '/yatras');
            $menu->regions->add('Авторизованные преподаватели', '/teachers');
        });

        \Menu::make('crumbs', function ($menu) {
            $mainNavigation = \Menu::get('main');
            $menu->add('Главная', ['route' => 'main']);
            foreach ($mainNavigation->items as $key => $item) {
                if ($item->attr('class') == 'active') {
                    $menu->add($item->title, isset($item->link->path['route']) ? $item->link->path['route'] : $item->link->path['url']);
                }
            }
        });

        return $next($request);
    }
}
