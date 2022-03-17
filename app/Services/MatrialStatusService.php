<?php

namespace App\Services;

use App\Models\MatrialStatus;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class MatrialStatusService
{
    private RepositoryInterface $matrialStatusRepository;

    public function __construct(RepositoryInterface $matrialStatusRepository)
    {
        $this->matrialStatusRepository = $matrialStatusRepository;
    }

    public function get()
    {
        return $this->matrialStatusRepository->get();
    }

    /*public function getQueryBuilder(): Builder
    {
        return $this->matrialStatusRepository->getQueryBuilder();
    }*/

    public function create(array $request): MatrialStatus
    {
        return $this->matrialStatusRepository->create($request);
    }

    public function show($id): MatrialStatus
    {
        return $this->matrialStatusRepository->find($id);
    }

    public function update(array $request, $id): MatrialStatus
    {
        return $this->matrialStatusRepository->update($id, $request);
    }

    public function delete($id): MatrialStatus
    {
        return $this->matrialStatusRepository->delete($id);
    }

    public function restore($id): MatrialStatus
    {
        return $this->matrialStatusRepository->restore($id);
    }

    public function forceDelete($id): MatrialStatus
    {
        return $this->matrialStatusRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->matrialStatusRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
