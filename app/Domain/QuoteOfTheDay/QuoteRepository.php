<?php

namespace App\Domain\QuoteOfTheDay;

use App\Repositories\AdminEditTrait;

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

}