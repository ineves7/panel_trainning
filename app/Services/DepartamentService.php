<?php

namespace App\Services;

use App\Models\Departament;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class DepartamentService
{
    private RepositoryInterface $departamentRepository;

    /**
     * DepartamentService constructor.
     * @param RepositoryInterface $departamentRepository
     */
    public function __construct(RepositoryInterface $departamentRepository)
    {
        $this->departamentRepository = $departamentRepository;
    }

    public function get()
    {
        return $this->departamentRepository->get();
    }

    public function create(array $request): Departament
    {
        return $this->departamentRepository->create($request);
    }

    public function show($id): Departament
    {
        return $this->departamentRepository->find($id);
    }

    public function update(array $request, $id): Departament
    {
        return $this->departamentRepository->update($id, $request);
    }

    public function delete($id): Departament
    {
        return $this->departamentRepository->delete($id);
    }

    public function restore($id): Departament
    {
        return $this->departamentRepository->restore($id);
    }

    public function forceDelete($id): Departament
    {
        return $this->departamentRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->departamentRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
