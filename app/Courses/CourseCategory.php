<?php
declare(strict_types=1);

namespace App\Courses;

use App\User;
use App\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class CourseCategory
 *
 * @package App\Courses
 *
 * @property string    $id
 * @property string    $status
 * @property string    $slug
 * @property string    $title
 * @property string    $description
 * @property string    $meta_title
 * @property string    $meta_description
 * @property string    $meta_keywords
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 */
class CourseCategory extends Model
{
    use Uuids;

    const STATUS_PUBLISHED = 'published';

    protected $table = 'course_categories';
    public $incrementing = false;

    protected $fillable = [
        'status',
        'slug',
        'title',
        'desctiption',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isPublished(): bool
    {
        return $this->status && $this->status == static::STATUS_PUBLISHED;
    }
}
