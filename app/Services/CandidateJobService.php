<?php

namespace App\Services;

use App\Models\Candidatejob;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class CandidatejobService
{
    private RepositoryInterface $candidatejobRepository;

    /**
     * CandidatejobService constructor.
     * @param RepositoryInterface $candidatejobRepository
     */
    public function __construct(RepositoryInterface $candidatejobRepository)
    {
        $this->candidatejobRepository = $candidatejobRepository;
    }

    public function get()
    {
        return $this->candidatejobRepository->get();
    }

    public function create(array $request): Candidatejob
    {
        return $this->candidatejobRepository->create($request);
    }

    public function show($id): Candidatejob
    {
        return $this->candidatejobRepository->find($id);
    }

    public function update(array $request, $id): Candidatejob
    {
        return $this->candidatejobRepository->update($id, $request);
    }

    public function delete($id): Candidatejob
    {
        return $this->candidatejobRepository->delete($id);
    }

    public function restore($id): Candidatejob
    {
        return $this->candidatejobRepository->restore($id);
    }

    public function forceDelete($id): Candidatejob
    {
        return $this->candidatejobRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->candidatejobRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
