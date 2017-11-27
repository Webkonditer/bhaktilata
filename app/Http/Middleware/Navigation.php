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
            $menu->raw('Бхакти-лата')->nickname('bhakti_lata');
            $menu->bhakti_lata->add('Миссия', 'about/program-and-vision');
            $menu->bhakti_lata->add('Ступени', 'about/stages');
            $menu->bhakti_lata->add('Вопросы и ответы', 'about/questions-and-answers');
            $menu->bhakti_lata->add('Материалы', 'about/materials');


            $menu->add('Рекомендованые проекты', 'projects')->nickname('projects')->data('megamenu', true);

            $menu->projects->raw('Внеконфессиональная проповедь')->nickname('projects_non_confessional');
            $menu->projects_non_confessional->add('Вечные ответы', 'eternal');
            $menu->projects->raw('Наставничество')->nickname('projects_mentoring');
            $menu->projects_mentoring->add('Базовый курс по наставничеству', 'mentor');
            $menu->projects_mentoring->add('Украинский наставнический курс', 'http://online.bhaktilata.ru/courses/course-v1:Test+Test+Test/about')->data('outer', true);

            $menu->projects->raw('Философия и практика')->nickname('projects_philosophy_and_practice');
            $menu->projects_philosophy_and_practice->raw('Общие курсы')->nickname('projects_philosophy_and_practice_general');

            $menu->projects_philosophy_and_practice_general->add('Серия курсов Бхакти-лата', 'about/materials');
            $menu->projects_philosophy_and_practice_general->add('Ученик в ИСККОН', 'idc');
            $menu->projects_philosophy_and_practice_general->add('Саманья-бхакти-шастры', 'bs');
//            $menu->projects_philosophy_and_practice->raw('Специализирвоанные курсы')->nickname('philosophy_and_practice_special_courses');
//            $menu->philosophy_and_practice_special_courses->add('Курсы санскрита', 'sanskrit');

            $menu->projects->raw('Создание общин')->nickname('projects_creating_commons');
            $menu->projects_creating_commons->add('Семейный коммитет', 'http://sk.mockt.ru/')->data('outer', true);

            $menu->projects->raw('Простая жизнь')->nickname('projects_simple_life');
            $menu->projects_simple_life->add('Комитет вайшнавких поселений', 'http://www.krishnaland.ru/ ')->data('outer', true);

            $menu->projects->raw('Служение в миссии')->nickname('projects_serving_in_mission');
            $menu->projects_serving_in_mission->add('Размышления над миссией', 'mission');
            $menu->projects_serving_in_mission->add('Курсы подготовки лидеров', 'leaders');
            $menu->projects_serving_in_mission->add('Джи-Би-Си колледж в России', 'gbc');
            $menu->projects_serving_in_mission->raw('Курсы подготовки учителей')->nickname('serving_in_mission_teachers_training_courses');
            $menu->serving_in_mission_teachers_training_courses->add('Часть 1', 'ttc1');
            $menu->serving_in_mission_teachers_training_courses->add('Часть 2: практикум', 'ttc2-1');
            $menu->serving_in_mission_teachers_training_courses->add('Часть 2: углубление', 'ttc2-2');
            $menu->serving_in_mission_teachers_training_courses->add('Часть 2: дискуссии и команды', 'ttc2-3');

            $menu->projects->raw('Другие проекты')->nickname('projects_another_projects');
            $menu->projects_another_projects->add('Партнёры Бхакти-латы', 'projects/another-projects/partners');
            $menu->projects_another_projects->add('Частные разработки', 'projects/another-projects/personal');

            $menu->raw('Ресурсы')->nickname('resources')->active('/resources/*');
            $menu->resources->add('Статьи', 'resources/articles');
            $menu->resources->add('Новости', 'resources/news/');
            $menu->resources->add('Видео/вебинары', 'resources/video');
            $menu->resources->add('Документы', 'resources/documents');
            $menu->resources->add('Ссылки', 'resources/links');
            $menu->resources->add('Заказ книг', 'resources/books');

            $menu->raw('Обучение')->nickname('studying');
            $menu->studying->add('Расписание очных курсов', 'studying/closest-courses');
            $menu->studying->add('Онлайн-обучение', 'https://online.bhaktilata.ru/')->data('outer', true);
            $menu->studying->add('Техническая поддержка', 'online-studying/how-to-use-platform');

            $menu->raw('Сотрудничество')->nickname('cooperation');
            $menu->cooperation->add('Принять участие', 'cooperation/participate');
            $menu->cooperation->add('Пожертвование', 'cooperation/donations');
            $menu->cooperation->add('Стать проектом Бхакти-латы', 'cooperation/become-a-project');
            $menu->cooperation->add('Стать преподавателем курса', 'cooperation/become-a-teacher');
            $menu->cooperation->add('Руководителям общин', 'cooperation/leaders');

            $menu->raw('Контакты')->nickname('contacts');
            $menu->contacts->add('Связь с нами', 'contacts/contact-us');
            $menu->contacts->add('Лидеры и преподаватели в регионах', 'contacts/leaders');
            $menu->contacts->add('Санга ведущих Бхакти-латы', 'contacts/community');
        });

        \Menu::make('crumbs', function ($menu) {
            $mainNavigation = \Menu::get('main');
//            $menu->add('Главная', ['route' => 'main']);
            foreach ($mainNavigation->items as $key => $item) {
                if ($item->attr('class') == 'active') {
                    $url = $item->link ?
                        isset($item->link->path['route']) ? ['route' => $item->link->path['route']] : $item->link->path['url'] :
                        null;
                    if (!$url) {
                        $menu->raw($item->title);
                    } else {
                        $menu->add($item->title, $url);
                    }
                    break;
                }
            }
            $menu->roots()->last()->attributes['class'] = 'active';
        });

        return $next($request);
    }
}
