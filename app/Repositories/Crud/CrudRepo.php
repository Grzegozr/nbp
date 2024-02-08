<?php

namespace App\Repositories\Crud;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CrudRepo implements ICrudRepo
{
    protected $model;
    public function __construct(Model $model) {
        $this->model = $model;
    }
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function all($attributes = []): Collection
    {
        return $this->model->orderBy(($attributes['order_by'] ?? 'id'), ($attributes['order_by_direction'] ?? 'desc'))
            ->get();
    }

    public function create(array $attributes): Model
    {
        if (auth()->check()) {
            $attributes['created_user_id'] = auth()->id();
        }

        return $this->model->create($attributes);
    }

    public function update(Model $model, array $attributes, array $files = []): Model
    {
        if (auth()->check()) {
            $attributes['updated_user_id'] = auth()->id();
        }

        $model->update($attributes);

        return $model;
    }

    public function delete(Model $model)
    {
        $model->delete();
    }

    public function increment(Model $model, $key = 'views')
    {
        $model->increment($key);
    }

    public function deleteId($id)
    {
        $this->model->where('id', $id)->delete();
    }
}
