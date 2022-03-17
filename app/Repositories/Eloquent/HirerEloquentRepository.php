<?php

namespace App\Repositories\Eloquent;

use App\Models\Hirer;
use App\Repositories\EloquentRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;

class HirerEloquentRepository extends EloquentRepository
{
    #[Pure]
    public function __construct()
    {
        parent::__construct(new Hirer());
    }

    public function get(): Collection
    {
        return parent::get();
    }

    public function create(array $data): Hirer | Model
    {
        return parent::create($data);
    }

    public function find($id): Hirer | Model
    {
        return parent::find($id);
    }

    public function update($id, $data): Hirer | Model
    {
        return parent::update($id, $data);
    }

    public function delete($id): Hirer | Model
    {
        return parent::delete($id);
    }

    public function restore($id): Hirer | Model
    {
        return parent::restore($id);
    }

    public function forceDelete($id): Hirer | Model
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
