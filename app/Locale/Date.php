<?php

namespace App\Locale;

class Date
{
    private $shortMonthNames = [
        'Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек',
    ];

    public function shortMonthName($month)
    {
        return isset($this->shortMonthNames[$month - 1]) ? $this->shortMonthNames[$month - 1] : '';
    }
}