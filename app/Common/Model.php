<?php

namespace App\Common;

use App\User;
use App\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class Model
 *
 * @package App\Common
 *
 * @property string $status
 * @property int    $user_id
 */
abstract class Model extends EloquentModel
{
    use Uuids;

    const STATUS_PUBLISHED = 'published';

    public $incrementing = false;

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

    public function fill(array $attributes)
    {
        $datesAttributes = array_keys(array_filter($this->getCasts(), function($type) {
            return $type == 'date';
        }));
        foreach ($datesAttributes as $attributeName) {
            if (!empty($attributes[$attributeName]) && !is_object($attributes[$attributeName])) {
                $attributes[$attributeName] = Carbon::createFromFormat('d.m.Y', $attributes[$attributeName]);
            }
        }
        return parent::fill($attributes);
    }
}