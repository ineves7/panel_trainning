<?php

namespace App\Services;

use App\Models\CandidateHabilityCategory;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class CandidateHabilityCategoryService
{
    private RepositoryInterface $candidateHabilityCategoryRepository;

    /**
     * CandidateHabilityCategoryService constructor.
     * @param RepositoryInterface $candidateHabilityCategoryRepository
     */
    public function __construct(RepositoryInterface $candidateHabilityCategoryRepository)
    {
        $this->candidateHabilityCategoryRepository = $candidateHabilityCategoryRepository;
    }

    public function get()
    {
        return $this->candidateHabilityCategoryRepository->get();
    }

    public function create(array $request): CandidateHabilityCategory
    {
        return $this->candidateHabilityCategoryRepository->create($request);
    }

    public function show($id): CandidateHabilityCategory
    {
        return $this->candidateHabilityCategoryRepository->find($id);
    }

    public function update(array $request, $id): CandidateHabilityCategory
    {
        return $this->candidateHabilityCategoryRepository->update($id, $request);
    }

    public function delete($id): CandidateHabilityCategory
    {
        return $this->candidateHabilityCategoryRepository->delete($id);
    }

    public function restore($id): CandidateHabilityCategory
    {
        return $this->candidateHabilityCategoryRepository->restore($id);
    }

    public function forceDelete($id): CandidateHabilityCategory
    {
        return $this->candidateHabilityCategoryRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->candidateHabilityCategoryRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
