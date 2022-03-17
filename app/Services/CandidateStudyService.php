<?php

namespace App\Services;

use App\Models\CandidateStudy;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class CandidateStudyService
{
    private RepositoryInterface $candidateStudyRepository;

    /**
     * CandidateStudyService constructor.
     * @param RepositoryInterface $candidateStudyRepository
     */
    public function __construct(RepositoryInterface $candidateStudyRepository)
    {
        $this->candidateStudyRepository = $candidateStudyRepository;
    }

    public function get()
    {
        return $this->candidateStudyRepository->get();
    }

    public function create(array $request): CandidateStudy
    {
        return $this->candidateStudyRepository->create($request);
    }

    public function show($id): CandidateStudy
    {
        return $this->candidateStudyRepository->find($id);
    }

    public function update(array $request, $id): CandidateStudy
    {
        return $this->candidateStudyRepository->update($id, $request);
    }

    public function delete($id): CandidateStudy
    {
        return $this->candidateStudyRepository->delete($id);
    }

    public function restore($id): CandidateStudy
    {
        return $this->candidateStudyRepository->restore($id);
    }

    public function forceDelete($id): CandidateStudy
    {
        return $this->candidateStudyRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->candidateStudyRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
