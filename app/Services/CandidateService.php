<?php

namespace App\Services;

use App\Models\Candidate;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class CandidateService
{
    private RepositoryInterface $candidateRepository;

    /**
     * CandidateService constructor.
     * @param RepositoryInterface $candidateRepository
     */
    public function __construct(RepositoryInterface $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;
    }

    public function get()
    {
        return $this->candidateRepository->get();
    }

    public function create(array $request): Candidate
    {
        return $this->candidateRepository->create($request);
    }

    public function show($id): Candidate
    {
        return $this->candidateRepository->find($id);
    }

    public function update(array $request, $id): Candidate
    {
        return $this->candidateRepository->update($id, $request);
    }

    public function delete($id): Candidate
    {
        return $this->candidateRepository->delete($id);
    }

    public function restore($id): Candidate
    {
        return $this->candidateRepository->restore($id);
    }

    public function forceDelete($id): Candidate
    {
        return $this->candidateRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->candidateRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
