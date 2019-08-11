<?php

namespace App\Http\Controllers;

class Redirects
{
    private static $redirects = [
        'resources/news/news2' => '/resources/news/online-training-course-start',
        'resources/news/news3' => '/resources/news/bhakti-steps-course-finished',
        'resources/news/news4' => '/resources/news/cooperation-section-released',
        'resources/news/news5' => '/resources/news/all-full-time-courses-schedule-released',
        'resources/news/news6' => '/resources/news/site-released',
        'resources/article1' => '/resources/articles/training-purposes',
        'resources/article2' => '/resources/articles/changing-the-paradigm',
        'resources/article3' => '/resources/articles/frequently-used-terms',
        'resources/article4' => '/resources/articles/about-learning-philosophy',
        'resources/article5' => '/resources/articles/shraddha',
        'resources/article6' => '/resources/articles/sadhu-sanga',
        'resources/article7' => '/resources/articles/first-and-second-initiations-role',
        'resources/article8' => '/resources/articles/bhadjana-kriya',
        'resources/article9' => '/resources/articles/anartha-nivritti',
    ];

    public static function has($path)
    {
        return array_key_exists($path, self::$redirects);
    }

    public static function get($path)
    {
        return array_get(self::$redirects, $path, '');
    }
}