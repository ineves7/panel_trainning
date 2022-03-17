<?php

namespace App\Repositories\Eloquent;

use App\Models\Candidate;
use App\Repositories\EloquentRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;

class CandidateEloquentRepository extends EloquentRepository
{
    #[Pure]
    public function __construct()
    {
        parent::__construct(new Candidate());
    }

    public function get(): Collection
    {
        return parent::get();
    }

    public function create(array $data): Candidate | Model
    {
        return parent::create($data);
    }

    public function find($id): Candidate | Model
    {
        return parent::find($id);
    }

    public function update($id, $data): Candidate | Model
    {
        return parent::update($id, $data);
    }

    public function delete($id): Candidate | Model
    {
        return parent::delete($id);
    }

    public function restore($id): Candidate | Model
    {
        return parent::restore($id);
    }

    public function forceDelete($id): Candidate | Model
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
