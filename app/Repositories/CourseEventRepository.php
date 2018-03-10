<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Domain\Courses\CourseEvent;
use App\View\Paginator;

class CourseEventRepository
{
    use AdminEditTrait;
    use PageableTrait;

    public function __construct()
    {
        $this->model = new CourseEvent();
    }

    public function findById(string $id): ?CourseEvent
    {
        return $this->model->query()->where('id', '=', $id)->firstOrFail();
    }

    public function getPage($page, $perPage = 20, $activeOnly = false)
    {
        $news = $this->queryAll();
        if ($activeOnly) {
            $news = $this->published($news);
        }
        $count = $news->count();
        return new Paginator(
            $this->paginate($news, $page, $perPage)->get(),
            $count,
            $perPage,
            $page
        );
    }

    public function closest()
    {
        $events = $this->queryAll();
        $events = $events->where('date_start', '>=', new \DateTime());
        $events->orderBy('date_start', 'ASC');
        return $events->get();
    }

    private function published($query)
    {
        return $query->where('status', CourseEvent::STATUS_PUBLISHED);
    }

    public function makeNew()
    {
        return new CourseEvent([
            'title' => '',
            'date' => null,
            'small_image' => '',
            'medium_image' => '',
            'full_image' => '',
            'content' => '',
            'slug' => '',
        ]);
    }
}
