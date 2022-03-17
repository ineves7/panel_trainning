<?php

namespace App\Repositories\Eloquent;

use App\Models\Profession;
use App\Repositories\EloquentRepository as parentAlias;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;

class ProfessionEloquentRepository extends parentAlias
{
    #[Pure]
    public function __construct()
    {
        parent::__construct(new Profession());
    }

    public function get(): Collection
    {
        return parent::get();
    }

    public function getQueryBuilder(): Builder
    {
        return parent::getQueryBuilder();
    }

    public function create(array $data): Profession | Model
    {
        return parent::create($data);
    }

    public function find($id): Profession | Model
    {
        return parent::find($id);
    }

    public function update($id, $data): Profession | Model
    {
        return parent::update($id, $data);
    }

    public function delete($id): Profession | Model
    {
        return parent::delete($id);
    }

    public function restore($id): Profession | Model
    {
        return parent::restore($id);
    }

    public function forceDelete($id): Profession | Model
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
