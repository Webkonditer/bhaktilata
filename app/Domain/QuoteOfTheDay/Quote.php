<?php

namespace App\Domain\QuoteOfTheDay;

use App\Common\Model;

/**
 * Class Quote
 *
 * @package App\Domain\QuoteOfTheDay
 *
 * @property \DateTime $day
 * @property \DateTime $date
 * @property string $text
 * @property string $location
 * @property string $author
 * @property string $status
 * @property int $user_id
 */
class Quote extends Model
{
    protected $table = 'quote_of_the_day';

    protected $rules = [
        'day' => 'string|required',
        'date' => 'date',
        'location' => 'string',
        'text' => 'string|required',
        'author' => 'string',
    ];

    protected $fillable = [
        'day',
        'date',
        'location',
        'text',
        'author',
    ];

    protected $casts = [
        'day' => 'date',
        'date' => 'date',
    ];
}
