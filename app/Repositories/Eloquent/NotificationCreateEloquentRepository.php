<?php

namespace App\Repositories\Eloquent;

use App\Models\Notification;
use App\Repositories\EloquentRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;

class NotificationCreateEloquentRepository extends EloquentRepository
{
    #[Pure]
    public function __construct()
    {
        parent::__construct(new Notification());
    }

    public function get(): Collection
    {
        return parent::get();
    }

    public function create($data): Notification | Model
    {
        return parent::create($data);
    }

    public function find($id): Notification | Model
    {
        return parent::find($id);
    }

    public function withTrashed(): Builder
    {
        return parent::withTrashed();
    }

    public function update($id, $data): Notification | Model
    {
        return parent::update($id, $data);
    }

    public function delete($id): Notification | Model
    {
        return parent::delete($id);
    }

    public function restore($id): Notification | Model
    {
        return parent::restore($id);
    }

    public function forceDelete($id): Notification | Model
    {
        return parent::forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return parent::paginate($perPage, $columns, $pageName, $page);
    }
}
