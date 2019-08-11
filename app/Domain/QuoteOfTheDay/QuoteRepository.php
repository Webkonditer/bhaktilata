<?php

namespace App\Domain\QuoteOfTheDay;

use App\Repositories\AdminEditTrait;
use Illuminate\Pagination\LengthAwarePaginator;

class QuoteRepository
{
    use AdminEditTrait {
        all as parentAll;
    }

    public function __construct()
    {
        $this->model = new Quote();
    }

    public function all()
    {
        return $this->queryAll()->orderBy('day', 'DESC')->get();
    }

    /**
     * Выборка цитат для одной страницы
     *
     * @param int $page
     * @param int $perPage
     *
     * @return LengthAwarePaginator
     */
    public function page($page, $perPage = 20)
    {
        $query = $this->queryAll();
        $countQuery = clone $query;
        return new LengthAwarePaginator(
            $this->paginate($this->queryAll()->orderBy('day', 'DESC'), $page, $perPage)->get(),
            $countQuery->count(),
            $perPage,
            $page
        );
    }

    public function forToday()
    {
        return $this->model->where('status', Quote::STATUS_PUBLISHED)->where('day', new \DateTime('midnight'))->inRandomOrder()->first();
    }

    public function makeNew()
    {
        $factory = new QuoteFactory();
        return $factory->makeFromArray([
            'text' => '',
            'author' => '',
            'location' => '',
        ]);
    }

    private function paginate($query, $page, $perPage)
    {
        return $query->skip($perPage * ($page - 1))->take($perPage);
    }
}