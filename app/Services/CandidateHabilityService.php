<?php

namespace App\Services;

use App\Models\CandidateHability;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class CandidateHabilityService
{
    private RepositoryInterface $candidateHabilityRepository;

    /**
     * CandidateHabilityService constructor.
     * @param RepositoryInterface $candidateHabilityRepository
     */
    public function __construct(RepositoryInterface $candidateHabilityRepository)
    {
        $this->candidateHabilityRepository = $candidateHabilityRepository;
    }

    public function get()
    {
        return $this->candidateHabilityRepository->get();
    }

    public function create(array $request): CandidateHability
    {
        return $this->candidateHabilityRepository->create($request);
    }

    public function show($id): CandidateHability
    {
        return $this->candidateHabilityRepository->find($id);
    }

    public function update(array $request, $id): CandidateHability
    {
        return $this->candidateHabilityRepository->update($id, $request);
    }

    public function delete($id): CandidateHability
    {
        return $this->candidateHabilityRepository->delete($id);
    }

    public function restore($id): CandidateHability
    {
        return $this->candidateHabilityRepository->restore($id);
    }

    public function forceDelete($id): CandidateHability
    {
        return $this->candidateHabilityRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->candidateHabilityRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
