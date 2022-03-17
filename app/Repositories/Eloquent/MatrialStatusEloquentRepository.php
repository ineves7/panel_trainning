<?php

namespace App\Repositories\Eloquent;

use App\Models\MatrialStatus;
use App\Repositories\EloquentRepository as parentAlias;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;

class MatrialStatusEloquentRepository extends parentAlias
{
    #[Pure]
    public function __construct()
    {
        parent::__construct(new MatrialStatus());
    }

    public function get(): Collection
    {
        return parent::get();
    }

    public function getQueryBuilder(): Builder
    {
        return parent::getQueryBuilder();
    }

    public function create(array $data): MatrialStatus | Model
    {
        return parent::create($data);
    }

    public function find($id): MatrialStatus | Model
    {
        return parent::find($id);
    }

    public function update($id, $data): MatrialStatus | Model
    {
        return parent::update($id, $data);
    }

    public function delete($id): MatrialStatus | Model
    {
        return parent::delete($id);
    }

    public function restore($id): MatrialStatus | Model
    {
        return parent::restore($id);
    }

    public function forceDelete($id): MatrialStatus | Model
    {
        return parent::forceDelete($id);
    }

    public function withTrashed(): Builder
    {
        return parent::withTrashed();
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return parent::paginate($perPage, $columns, $pageName, $page);
    }
}
