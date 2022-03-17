<?php

namespace App\Services;

use App\Models\Profession;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class ProfessionService
{
    private RepositoryInterface $professionRepository;

    public function __construct(RepositoryInterface $professionRepository)
    {
        $this->professionRepository = $professionRepository;
    }

    public function get()
    {
        return $this->professionRepository->get();
    }

    /*public function getQueryBuilder(): Builder
    {
        return $this->professionRepository->getQueryBuilder();
    }*/

    public function create(array $request): Profession
    {
        return $this->professionRepository->create($request);
    }

    public function show($id): Profession
    {
        return $this->professionRepository->find($id);
    }

    public function update(array $request, $id): Profession
    {
        return $this->professionRepository->update($id, $request);
    }

    public function delete($id): Profession
    {
        return $this->professionRepository->delete($id);
    }

    public function restore($id): Profession
    {
        return $this->professionRepository->restore($id);
    }

    public function forceDelete($id): Profession
    {
        return $this->professionRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->professionRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
