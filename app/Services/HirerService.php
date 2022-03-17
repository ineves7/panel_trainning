<?php

namespace App\Services;

use App\Models\Hirer;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class HirerService
{
    private RepositoryInterface $HirerRepository;

    /**
     * HirerService constructor.
     * @param RepositoryInterface $HirerRepository
     */
    public function __construct(RepositoryInterface $HirerRepository)
    {
        $this->HirerRepository = $HirerRepository;
    }

    public function get()
    {
        return $this->HirerRepository->get();
    }

    public function create(array $request): Hirer
    {
        return $this->HirerRepository->create($request);
    }

    public function show($id): Hirer
    {
        return $this->HirerRepository->find($id);
    }

    public function update(array $request, $id): Hirer
    {
        return $this->HirerRepository->update($id, $request);
    }

    public function delete($id): Hirer
    {
        return $this->HirerRepository->delete($id);
    }

    public function restore($id): Hirer
    {
        return $this->HirerRepository->restore($id);
    }

    public function forceDelete($id): Hirer
    {
        return $this->HirerRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->HirerRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
