<?php
declare(strict_types=1);

namespace App\Courses;

use App\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class CourseCategory
 *
 * @package App\Courses
 *
 * @property string    $id
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

    protected $table = 'course_categories';
    public $incrementing = false;

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
