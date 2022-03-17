<?php

namespace App\Services;

use App\Models\Vacancy;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class VacancyService
{
    private RepositoryInterface $VacancyRepository;

    /**
     * VacancyService constructor.
     * @param RepositoryInterface $VacancyRepository
     */
    public function __construct(RepositoryInterface $VacancyRepository)
    {
        $this->VacancyRepository = $VacancyRepository;
    }

    public function get()
    {
        return $this->VacancyRepository->get();
    }

    public function create(array $request): Vacancy
    {
        return $this->VacancyRepository->create($request);
    }

    public function show($id): Vacancy
    {
        return $this->VacancyRepository->find($id);
    }

    public function update(array $request, $id): Vacancy
    {
        return $this->VacancyRepository->update($id, $request);
    }

    public function delete($id): Vacancy
    {
        return $this->VacancyRepository->delete($id);
    }

    public function restore($id): Vacancy
    {
        return $this->VacancyRepository->restore($id);
    }

    public function forceDelete($id): Vacancy
    {
        return $this->VacancyRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->VacancyRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
