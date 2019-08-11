<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Domain\Articles\Article;
use App\View\Paginator;

class ArticlesRepository
{
    use AdminEditTrait {
        queryAll as protected traitQueryAll;
    }
    use PageableTrait;

    public function __construct()
    {
        $this->model = new Article();
    }

    public function findById(string $id): ?Article
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
        return $this->queryAll()->take($count)->get();
    }

    private function published($query)
    {
        return $query->where('status', Article::STATUS_PUBLISHED);
    }

    private function buildOrderBy($query)
    {
        $query->orderBy('date', 'DESC');
        return $this;
    }

    public function makeNew()
    {
        return new Article([
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
