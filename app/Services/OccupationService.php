<?php

namespace App\Services;

use App\Models\Occupation;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class OccupationService
{
    private RepositoryInterface $OccupationRepository;

    /**
     * OccupationService constructor.
     * @param RepositoryInterface $OccupationRepository
     */
    public function __construct(RepositoryInterface $OccupationRepository)
    {
        $this->OccupationRepository = $OccupationRepository;
    }

    public function get()
    {
        return $this->OccupationRepository->get();
    }

    public function create(array $request): Occupation
    {
        return $this->OccupationRepository->create($request);
    }

    public function show($id): Occupation
    {
        return $this->OccupationRepository->find($id);
    }

    public function update(array $request, $id): Occupation
    {
        return $this->OccupationRepository->update($id, $request);
    }

    public function delete($id): Occupation
    {
        return $this->OccupationRepository->delete($id);
    }

    public function restore($id): Occupation
    {
        return $this->OccupationRepository->restore($id);
    }

    public function forceDelete($id): Occupation
    {
        return $this->OccupationRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->OccupationRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
