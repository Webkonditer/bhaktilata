<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Domain\News\News;
use App\View\Paginator;

class NewsRepository
{
    use AdminEditTrait {
        queryAll as protected traitQueryAll;
    }
    use PageableTrait;

    public function __construct()
    {
        $this->model = new News();
    }

    public function findById(string $id): ?News
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

    public function findBySlug(string $slug)
    {
        return $this->queryAll()->where('slug', $slug)->first();
    }

    public function latest($count)
    {
        return $this->published($this->queryAll()->take($count))->get();
    }

    private function published($query)
    {
        return $query->where('status', News::STATUS_PUBLISHED);
    }

    private function buildOrderBy($query)
    {
        $query->orderBy('date', 'DESC');
        return $this;
    }

    public function makeNew()
    {
        return new News([
            'title' => '',
            'date' => null,
            'small_image' => '',
            'medium_image' => '',
            'full_image' => '',
            'content' => '',
            'slug' => '',
        ]);
    }

    protected function queryAll()
    {
        $query = $this->traitQueryAll() ;
        $this->buildOrderBy($query);
        return $query;
    }
}
