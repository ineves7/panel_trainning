<?php

namespace App\Repositories\Eloquent;

use App\Models\Document;
use App\Repositories\EloquentRepository as parentAlias;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;

class DocumentEloquentRepository extends parentAlias
{
    #[Pure]
    public function __construct()
    {
        parent::__construct(new Document());
    }

    public function get(): Collection
    {
        return parent::get();
    }

    public function getQueryBuilder(): Builder
    {
        return parent::getQueryBuilder();
    }

    public function create(array $data): Document | Model
    {
        return parent::create($data);
    }

    public function find($id): Document | Model
    {
        return parent::find($id);
    }

    public function update($id, $data): Document | Model
    {
        return parent::update($id, $data);
    }

    public function delete($id): Document | Model
    {
        return parent::delete($id);
    }

    public function restore($id): Document | Model
    {
        return parent::restore($id);
    }

    public function forceDelete($id): Document | Model
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
