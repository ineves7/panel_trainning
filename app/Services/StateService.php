<?php

namespace App\Services;

use App\Models\State;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class StateService
{
    private RepositoryInterface $stateRepository;

    /**
     * StateService constructor.
     * @param RepositoryInterface $stateRepository
     */
    public function __construct(RepositoryInterface $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }

    public function get()
    {
        return $this->stateRepository->get();
    }

    public function create(array $request): State
    {
        return $this->stateRepository->create($request);
    }

    public function show($id): State
    {
        return $this->stateRepository->find($id);
    }

    public function update(array $request, $id): State
    {
        return $this->stateRepository->update($id, $request);
    }

    public function delete($id): State
    {
        return $this->stateRepository->delete($id);
    }

    public function restore($id): State
    {
        return $this->stateRepository->restore($id);
    }

    public function forceDelete($id): State
    {
        return $this->stateRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->stateRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
