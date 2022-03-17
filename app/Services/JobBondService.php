<?php

namespace App\Services;

use App\Models\JobBond;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class JobBondService
{
    private RepositoryInterface $JobBondRepository;

    /**
     * JobBondService constructor.
     * @param RepositoryInterface $JobBondRepository
     */
    public function __construct(RepositoryInterface $JobBondRepository)
    {
        $this->JobBondRepository = $JobBondRepository;
    }

    public function get()
    {
        return $this->JobBondRepository->get();
    }

    public function create(array $request): JobBond
    {
        return $this->JobBondRepository->create($request);
    }

    public function show($id): JobBond
    {
        return $this->JobBondRepository->find($id);
    }

    public function update(array $request, $id): JobBond
    {
        return $this->JobBondRepository->update($id, $request);
    }

    public function delete($id): JobBond
    {
        return $this->JobBondRepository->delete($id);
    }

    public function restore($id): JobBond
    {
        return $this->JobBondRepository->restore($id);
    }

    public function forceDelete($id): JobBond
    {
        return $this->JobBondRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->JobBondRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
