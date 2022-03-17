<?php

namespace App\Repositories\Eloquent;

use App\Models\Work;
use App\Repositories\EloquentRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;

class WorkEloquentRepository extends EloquentRepository
{
    #[Pure]
    public function __construct()
    {
        parent::__construct(new Work());
    }

    public function get(): Collection
    {
        return parent::get();
    }

    public function create(array $data): Work | Model
    {
        return parent::create($data);
    }

    public function find($id): Work | Model
    {
        return parent::find($id);
    }

    public function update($id, $data): Work | Model
    {
        return parent::update($id, $data);
    }

    public function delete($id): Work | Model
    {
        return parent::delete($id);
    }

    public function restore($id): Work | Model
    {
        return parent::restore($id);
    }

    public function forceDelete($id): Work | Model
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
