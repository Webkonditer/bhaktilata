<?php
declare(strict_types=1);

namespace App\Projects;

use App\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Project
 *
 * @package App\Projects
 *
 * @property string          $id
 * @property string          $status
 * @property ProjectCategory $category
 * @property string          $category_id
 * @property string          $slug
 * @property string          $title
 * @property bool            $is_opened
 * @property string          $description
 * @property string          $meta_title
 * @property string          $meta_description
 * @property string          $meta_keywords
 * @property \DateTime       $created_at
 * @property \DateTime       $updated_at
 */
class Project extends Model
{
    use Uuids;

    const STATUS_PUBLISHED = 'published';

    protected $table = 'projects';

    public $incrementing = false;

    protected $fillable = [
        'status',
        'slug',
        'is_opened',
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
        return $this->belongsTo(ProjectCategory::class);
    }

    public function isPublished(): bool
    {
        return $this->status && $this->status == static::STATUS_PUBLISHED;
    }
}
