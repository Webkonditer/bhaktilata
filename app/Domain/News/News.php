<?php

namespace App\Domain\News;

use App\Common\Model;

/**
 * Class News
 *
 * @package App\Domain\News
 *
 * @property string    $id
 * @property string    $title
 * @property \DateTime $date
 * @property string    $slug
 * @property string    $content
 * @property string    $small_image
 * @property string    $medium_image
 * @property string    $full_image
 */
class News extends Model
{
    protected $table = 'news';

    protected $rules = [
        'title' => 'string|max:255|required',
        'date' => 'date_format:d.m.Y|required',
        'small_image' => 'string|max:255',
        'medium_image' => 'string|max:255',
        'full_image' => 'string|max:255',
        'content' => 'string',
        'slug' => 'string',
    ];

    protected $fillable = [
        'title',
        'date',
        'small_image',
        'medium_image',
        'full_image',
        'content',
        'slug',
    ];

    protected $casts = [
        'section' => 'integer',
        'sort' => 'integer',
        'date' => 'date',
    ];

    protected $dates = [
        'date',
    ];

    public function smallImagePath()
    {
        $path = $this->small_image ?: $this->medium_image;
        return $path ? \Storage::disk('public')->url($path) : '';
    }

    public function mediumImagePath()
    {
        return $this->medium_image ? \Storage::disk('public')->url($this->medium_image) : '';
    }
}
