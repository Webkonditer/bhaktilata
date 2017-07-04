<?php
declare(strict_types=1);

namespace App\Courses;

use App\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Course
 *
 * @package App\Courses
 *
 * @property string         $id
 * @property string         $status
 * @property CourseCategory $category
 * @property string         $category_id
 * @property string         $slug
 * @property string         $title
 * @property string         $description
 * @property string         $meta_title
 * @property string         $meta_description
 * @property string         $meta_keywords
 * @property \DateTime      $created_at
 * @property \DateTime      $updated_at
 */
class Course extends Model
{
    use Uuids;

    const STATUS_PUBLISHED = 'published';

    protected $table = 'courses';

    public $incrementing = false;

    protected $fillable = [
        'status',
        'slug',
        'category_id',
        'title',
        'announce',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function isPublished(): bool
    {
        return $this->status && $this->status == static::STATUS_PUBLISHED;
    }
}
