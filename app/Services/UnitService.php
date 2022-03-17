<?php

namespace App\Services;

use App\Models\Unit;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class UnitService
{
    private RepositoryInterface $unitRepository;

    /**
     * UnitService constructor.
     * @param RepositoryInterface $unitRepository
     */
    public function __construct(RepositoryInterface $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }

    public function get()
    {
        return $this->unitRepository->get();
    }

    public function create(array $request): Unit
    {
        return $this->unitRepository->create($request);
    }

    public function show($id): Unit
    {
        return $this->unitRepository->find($id);
    }

    public function update(array $request, $id): Unit
    {
        return $this->unitRepository->update($id, $request);
    }

    public function delete($id): Unit
    {
        return $this->unitRepository->delete($id);
    }

    public function restore($id): Unit
    {
        return $this->unitRepository->restore($id);
    }

    public function forceDelete($id): Unit
    {
        return $this->unitRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->unitRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
