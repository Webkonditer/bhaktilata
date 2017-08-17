<?php
declare(strict_types=1);

namespace App\Pages;

use App\User;
use App\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 *
 * @package App\Projects
 *
 * @property string          $id
 * @property string          $status
 * @property string          $path
 * @property string          $title
 * @property string          $content
 * @property int             $user_id
 * @property string          $meta_title
 * @property string          $meta_description
 * @property string          $meta_keywords
 * @property string          $image
 * @property \DateTime       $created_at
 * @property \DateTime       $updated_at
 */
class Page extends Model
{
    use Uuids;

    const STATUS_PUBLISHED = 'published';

    protected $table = 'pages';

    public $incrementing = false;

    protected $fillable = [
        'status',
        'path',
        'title',
        'image',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->status = 'draft';
    }

    public function setPublishStatus($published)
    {
        $this->status = $published ? 'published' : 'unpublished';
    }

    public function isPublished(): bool
    {
        return $this->status && $this->status == static::STATUS_PUBLISHED;
    }

    public function setUser(User $user)
    {
        $this->user_id = $user->id;
    }
}
