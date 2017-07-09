<?php
declare(strict_types=1);

namespace App\Projects;

use App\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class CourseCategory
 *
 * @package App\Courses
 *
 * @property string    $id
 * @property string    $slug
 * @property string    $title
 * @property string    $description
 * @property string    $meta_title
 * @property string    $meta_description
 * @property string    $meta_keywords
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 */
class ProjectCategory extends Model
{
    use Uuids;

    protected $table = 'projects_categories';
    public $incrementing = false;

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
