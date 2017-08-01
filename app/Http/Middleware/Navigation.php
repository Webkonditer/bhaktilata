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
//            $menu->add('Главная', ['route' => 'main']);
            $menu->add('Бхакти-лата', 'bhakti-lata')->nickname('bhakti_lata');
            $menu->bhakti_lata->add('О проекте', 'bhakti-lata/about');
            $menu->bhakti_lata->add('Серия курсов "Бхакти-лата"', 'bhakti-lata/course_series')->nickname('bhakti_lata_series');
            $menu->bhakti_lata_series->add('Ступень 1', 'bhakti-lata/course_series/stage-1');
            $menu->bhakti_lata_series->add('Ступень 2', 'bhakti-lata/course_series/stage-2');
            $menu->bhakti_lata_series->add('Ступень 3', 'bhakti-lata/course_series/stage-3');
            $menu->bhakti_lata_series->add('Ступень 4', 'bhakti-lata/course_series/stage-4');
            $menu->add('Наши проекты', 'projects')->nickname('projects');
//            $repo = app()->make('App\Repositories\ProjectCategoryRepository');
//            foreach ($repo->firstLevel() as $category) {
//                $menu->projects
//                    ->add($category->title, ['route' => [
//                        'projects.category',
//                        'project_category_slug' => $category->slugPath()
//                    ]])
//                    ->active(route('projects.category', ['project_category_slugs' => $category->slugPath()], false) . '*');
//            }

            $menu->projects->add('Внеконфессиональная проповедь', 'projects/non-confessional-preaching')->nickname('projects_non_confessional');
            $menu->projects_non_confessional->add('Вечные ответы', 'projects/non-confessional-preaching/eternal-answers');
            $menu->projects->add('Наставничество', 'projects/mentoring')->nickname('projects_mentoring');
            $menu->projects_mentoring->add('Базовый курс по наставничеству', 'projects/mentoring/basic-course');
            $menu->projects->add('Философия и практика', 'projects/philosophy-and-practice')->nickname('projects_philosophy_and_practice');

            $menu->projects_philosophy_and_practice->add('Общие курсы', 'projects/philosophy-and-practice/common-courses')->nickname('projects_philosophy_and_practice_general');

            $menu->projects_philosophy_and_practice_general->add('Серия курсов Бхакти-лата', 'projects/philosophy-and-practice/common-courses/bhakti-lata-series');
            $menu->projects_philosophy_and_practice_general->add('Ученик в ИСККОН', 'projects/philosophy-and-practice/common-courses/student-in-iskcon');
            $menu->projects_philosophy_and_practice_general->add('Саманья-бхакти-шастры', 'projects/philosophy-and-practice/common-courses/samanha-bhakti-sastra');
            $menu->projects_philosophy_and_practice->add('Специализирвоанные курсы', 'projects/philosophy-and-practice/special-courses')->nickname('philosophy_and_practice_special_courses');
            $menu->philosophy_and_practice_special_courses->add('Школа джапа медитации', 'projects/philosophy-and-practice/special-courses/japa-meditation-school');
            $menu->philosophy_and_practice_special_courses->add('Курсы санскрита', 'projects/philosophy-and-practice/common-courses/sanskrit-courses');

            $menu->projects->add('Служение в миссии', 'projects/serving-in-mission')->nickname('projects_serving_in_mission');
            $menu->projects_serving_in_mission->add('Размышления над миссией', 'projects/serving-in-mission/reflections-on-the-mission');
            $menu->projects_serving_in_mission->add('Курсы подготовки учителей', 'projects/serving-in-mission/teachers-training-courses')->nickname('serving_in_mission_teachers_training_courses');
            $menu->serving_in_mission_teachers_training_courses->add('Часть 1', 'projects/serving-in-mission/teachers-training-courses/part-1');
            $menu->serving_in_mission_teachers_training_courses->add('Часть 2: практикум', 'projects/serving-in-mission/teachers-training-courses/part-2-practice');
            $menu->serving_in_mission_teachers_training_courses->add('Часть 2: углубление', 'projects/serving-in-mission/teachers-training-courses/part-2-deep');
            $menu->serving_in_mission_teachers_training_courses->add('Часть 2: дискуссии и команды', 'projects/serving-in-mission/teachers-training-courses/part-2-discussion-and-commands');
            $menu->projects_serving_in_mission->add('Курсы подготовки лидеров', 'projects/philosophy-and-practice/leadership-training');

            $menu->projects->add('Другие проекты', 'projects/another-projects')->nickname('projects_another_projects');
            $menu->projects_another_projects->add('Партнёры Бхакти-латы', 'projects/another-projects/partners');
            $menu->projects_another_projects->add('Частные разработки', 'projects/another-projects/personal');

            $menu->projects->add('Ресурсы', 'resources')->nickname('projects_resources');
            $menu->projects_resources->add('Статьи', 'resources/articles');
            $menu->projects_resources->add('Новости', 'resources/news');
            $menu->projects_resources->add('Видео/вебинары', 'resources/video');
            $menu->projects_resources->add('Документы', 'resources/documents');
            $menu->projects_resources->add('Ссылки', 'resources/links');
            $menu->projects_resources->add('Заказ книг', 'resources/books');

            $menu->add('Онлайн-обучение', 'http://gbc.bhaktilata.ru/')->nickname('online_studying');
            $menu->online_studying->add('Как работать с платформой', 'online-studying/how-to-use-platform');
            $menu->online_studying->add('Все курсы', 'online-studying/all-courses');

            $menu->add('Сотрудничество', 'cooperation')->nickname('cooperation');
            $menu->cooperation->add('Сотрудничество', 'cooperation/cooperation');
            $menu->cooperation->add('Пожертвование', 'cooperation/donations');
            $menu->cooperation->add('Стать проектов Бхакти-латы', 'cooperation/become-a-project');

            $menu->add('Контакты', 'contacts')->nickname('contacts');
            $menu->contacts->add('Бхакти-лата в общинах', 'contacts/bhaktilata-in-yatras');
            $menu->contacts->add('Лидеры и преподаватели в регионах', 'contacts/leaders');

//            $menu->add('Курсы', ['route' => 'courses'])->nickname('courses');
//            $repo = app()->make('App\Repositories\CourseCategoryRepository');
//            foreach ($repo->published() as $category) {
//                $menu->courses
//                    ->add($category->title, ['route' => [
//                        'courses.category',
//                        'course_category_slug' => $category->slug
//                    ]])
//                    ->active(route('courses.category', ['course_category_slug' => $category->slug], false) . '/*');
//            }
        });

        \Menu::make('crumbs', function ($menu) {
            $mainNavigation = \Menu::get('main');
            $menu->add('Главная', ['route' => 'main']);
            foreach ($mainNavigation->items as $key => $item) {
                if ($item->attr('class') == 'active') {
                    $menu->add($item->title, isset($item->link->path['route']) ? ['route' => $item->link->path['route']] : $item->link->path['url']);
                }
            }
            $menu->roots()->last()->attributes['class'] = 'active';
        });

        return $next($request);
    }
}
