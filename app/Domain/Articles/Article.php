<?php

namespace App\Domain\Articles;

use App\Common\Model;

/**
 * Class Articles
 *
 * @package App\Domain\Articles
 *
 * @property string    $id
 * @property string    $title
 * @property \DateTime $date
 * @property string    $slug
 * @property string    $content
 * @property string    $author
 * @property string    $announce
 * @property string    $small_image
 * @property string    $medium_image
 * @property string    $full_image
 */
class Article extends Model
{
    protected $table = 'articles';

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
        'author',
        'announce',
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
