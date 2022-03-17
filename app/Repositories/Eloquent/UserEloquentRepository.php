<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\EloquentRepository as parentAlias;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;

class UserEloquentRepository extends parentAlias
{
    /**
     * UserEloquentRepository constructor.
     */
    #[Pure]
    public function __construct()
    {
        parent::__construct(new User());
    }

    public function get(): Collection
    {
        return parent::get();
    }

    public function create(array $data): User | Model
    {
        return parent::create($data);
    }

    public function find($id): User | Model
    {
        return parent::find($id);
    }

    public function update($id, $data): User | Model
    {
        return parent::update($id, $data);
    }

    public function delete($id): User | Model
    {
        return parent::delete($id);
    }

    public function restore($id): User | Model
    {
        return parent::restore($id);
    }

    public function forceDelete($id): User | Model
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
