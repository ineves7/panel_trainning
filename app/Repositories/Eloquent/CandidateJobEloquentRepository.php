<?php

namespace App\Repositories\Eloquent;

use App\Models\CandidateJob;
use App\Repositories\EloquentRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;

class CandidateJobEloquentRepository extends EloquentRepository
{
    #[Pure]
    public function __construct()
    {
        parent::__construct(new CandidateJob());
    }

    public function get(): Collection
    {
        return parent::get();
    }

    public function create(array $data): CandidateJob | Model
    {
        return parent::create($data);
    }

    public function find($id): CandidateJob | Model
    {
        return parent::find($id);
    }

    public function update($id, $data): CandidateJob | Model
    {
        return parent::update($id, $data);
    }

    public function delete($id): CandidateJob | Model
    {
        return parent::delete($id);
    }

    public function restore($id): CandidateJob | Model
    {
        return parent::restore($id);
    }

    public function forceDelete($id): CandidateJob | Model
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
