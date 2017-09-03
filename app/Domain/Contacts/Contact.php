<?php

namespace App\Domain\Contacts;

use App\Common\Model;

/**
 * Class Contact
 *
 * @package App\Domain\Contacts
 *
 * @property string $id
 * @property string $place
 * @property string $name
 * @property string $email
 * @property int    $section
 */
class Contact extends Model
{
    protected $table = 'contacts';

    protected $rules = [
        'place' => 'string|required',
        'name' => 'string|required',
        'email' => 'string|required|email',
        'section' => 'integer|required',
    ];

    protected $fillable = [
        'place',
        'name',
        'email',
        'section',
    ];

    protected $casts = [
        'section' => 'integer',
    ];

    protected static $sections = [
        1 =>  'Ответственные за образование в регионах и проектах',
        2 =>  'Авторизованные центры Бхакти-шастр в России',
        3 =>  'Преподавателями курса "Ученик в ИСККОН"',
        4 =>  'Преподавателями курса "Подготовки учителей, часть 1',
    ];

    public function getSectionTitle()
    {
        return !empty(static::$sections[$this->section]) ? static::$sections[$this->section] : '';
    }

    public static function getSectionsList()
    {
        return static::$sections;
    }
}
