<?php

namespace App\Repositories;

use App\Trait\SpatieQueryBuilderTrait;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class EloquentRepository implements RepositoryInterface
{
    use SpatieQueryBuilderTrait;

    private Model $model;

    protected $filters = [];

    protected $sorts = [];

    protected $fields = [];

    protected $includes = [];

    protected $appends = [];

    /**
     * EloquentRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function get(): Collection | Array
    {
        return $this->model::all();
    }

    public function getQueryBuilder(): Builder
    {
        return $this->model::query();
    }

    public function create(array $data): Model
    {
        $model = $this->model;
        $model->fill($data)->saveOrFail();
        return $model;
    }
    public function find($id): Model
    {
        return $this->model::findOrFail($id);
    }

    public function withTrashed(): Builder
    {
        return $this->model::withTrashed();
    }

    public function update($id, array $data): Model
    {
        $model = $this->find($id);
        $model->fill($data)->saveOrFail();
        return $model;
    }

    public function delete($id): Model
    {
        $model = $this->find($id);
        $model->delete();
        return $model;
    }

    public function restore($id): Model
    {
        $model = $this->withTrashed()->findOrFail($id);
        $model->restore();
        return $model;
    }

    public function forceDelete($id): Model
    {
        $model = $this->withTrashed()->findOrFail($id);
        $model->forceDelete();
        return $model;
    }

    public function paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->getQueryBuilder()->paginate($perPage, $columns, $pageName, $page);
    }
}
