<?php

namespace App\Repositories;

use App\User;
use Illuminate\Database\Eloquent\Model;

trait AdminEditTrait
{
    /** @var Model */
    protected $model;

    public function all()
    {
        return $this->model->query()->whereNotIn('status', ['draft', 'deleted'])->get();
    }

    public function save(Model $entity): bool
    {
        return $entity->save();
    }

    public function remove(Model $entity): bool
    {
        $entity->status = 'deleted';
        return $entity->save();
    }

    public function getDraft(User $user): ?Model
    {
        return $this->model->query()->where('status', 'draft')->where('user_id', $user->id)->first();
    }
}