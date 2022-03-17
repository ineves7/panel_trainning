<?php

namespace App\Repositories\Eloquent;

use App\Models\NotificationUser;
use App\Repositories\EloquentRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;
use Spatie\QueryBuilder\QueryBuilder;

class NotificationUserEloquentRepository extends EloquentRepository
{
    #[Pure]
    public function __construct()
    {
        parent::__construct(new NotificationUser());
    }

    public function create($data): NotificationUser | Model
    {
        return parent::create($data);
    }

    public function update($id, $data): NotificationUser | Model
    {
        return parent::update($id, $data);
    }

    public function get(): Collection | array
    {
        return parent::get();
    }

    public function find($id): NotificationUser | Model
    {
        return parent::find($id);
    }

    public function withTrashed(): Builder
    {
        return parent::withTrashed();
    }

    public function delete($id): NotificationUser | Model
    {
        return parent::delete($id);
    }

    public function restore($id): NotificationUser | Model
    {
        return parent::restore($id);
    }

    public function forceDelete($id): NotificationUser | Model
    {
        return parent::forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return parent::paginate($perPage, $columns, $pageName, $page);
    }
}
