<?php

namespace App\Repositories\Eloquent;

use App\Models\DocumentType;
use App\Repositories\EloquentRepository as parentAlias;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;

class DocumentTypeEloquentRepository extends parentAlias
{
    #[Pure]
    public function __construct()
    {
        parent::__construct(new DocumentType());
    }

    public function get(): Collection
    {
        return parent::get();
    }

    public function getQueryBuilder(): Builder
    {
        return parent::getQueryBuilder();
    }

    public function create(array $data): DocumentType | Model
    {
        return parent::create($data);
    }

    public function find($id): DocumentType | Model
    {
        return parent::find($id);
    }

    public function update($id, $data): DocumentType | Model
    {
        return parent::update($id, $data);
    }

    public function delete($id): DocumentType | Model
    {
        return parent::delete($id);
    }

    public function restore($id): DocumentType | Model
    {
        return parent::restore($id);
    }

    public function forceDelete($id): DocumentType | Model
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
