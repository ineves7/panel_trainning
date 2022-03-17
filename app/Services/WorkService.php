<?php

namespace App\Services;

use App\Models\Work;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class WorkService
{
    private RepositoryInterface $WorkRepository;

    /**
     * WorkService constructor.
     * @param RepositoryInterface $WorkRepository
     */
    public function __construct(RepositoryInterface $WorkRepository)
    {
        $this->WorkRepository = $WorkRepository;
    }

    public function get()
    {
        return $this->WorkRepository->get();
    }

    public function create(array $request): Work
    {
        return $this->WorkRepository->create($request);
    }

    public function show($id): Work
    {
        return $this->WorkRepository->find($id);
    }

    public function update(array $request, $id): Work
    {
        return $this->WorkRepository->update($id, $request);
    }

    public function delete($id): Work
    {
        return $this->WorkRepository->delete($id);
    }

    public function restore($id): Work
    {
        return $this->WorkRepository->restore($id);
    }

    public function forceDelete($id): Work
    {
        return $this->WorkRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->WorkRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
