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

    protected $table = 'courses';
    public $incrementing = false;

    public function category(): BelongsTo
    {
        return $this->belongsTo(CourseCategory::class);
    }
}
