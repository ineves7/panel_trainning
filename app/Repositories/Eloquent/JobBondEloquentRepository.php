<?php

namespace App\Repositories\Eloquent;

use App\Models\JobBond;
use App\Repositories\EloquentRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;

class JobBondEloquentRepository extends EloquentRepository
{
    #[Pure]
    public function __construct()
    {
        parent::__construct(new JobBond());
    }

    public function get(): Collection
    {
        return parent::get();
    }

    public function create(array $data): JobBond | Model
    {
        return parent::create($data);
    }

    public function find($id): JobBond | Model
    {
        return parent::find($id);
    }

    public function update($id, $data): JobBond | Model
    {
        return parent::update($id, $data);
    }

    public function delete($id): JobBond | Model
    {
        return parent::delete($id);
    }

    public function restore($id): JobBond | Model
    {
        return parent::restore($id);
    }

    public function forceDelete($id): JobBond | Model
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
