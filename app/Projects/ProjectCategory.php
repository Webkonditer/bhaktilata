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

    const STATUS_PUBLISHED = 'published';

    protected $table = 'projects_categories';
    public $incrementing = false;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'parent_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function isPublished(): bool
    {
        return $this->status && $this->status == static::STATUS_PUBLISHED;
    }

    public function parent()
    {
        return $this->belongsTo(ProjectCategory::class, 'parent_id');
    }

    public function slugPath()
    {
        $slug = '';
        if ($parent = $this->parent) {
            $slug = $parent->slugPath();
        }
        return ltrim($slug . '/' . $this->slug, '/');

    }
}
