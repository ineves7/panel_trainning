<?php

namespace App\Services;

use App\Models\AcademicEducation;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class AcademicEducationService
{
    private RepositoryInterface $academicEducationRepository;

    /**
     * AcademicEducationService constructor.
     * @param RepositoryInterface $academicEducationRepository
     */
    public function __construct(RepositoryInterface $academicEducationRepository)
    {
        $this->academicEducationRepository = $academicEducationRepository;
    }

    public function get()
    {
        return $this->academicEducationRepository->get();
    }

    public function create(array $request): AcademicEducation
    {
        return $this->academicEducationRepository->create($request);
    }

    public function show($id): AcademicEducation
    {
        return $this->academicEducationRepository->find($id);
    }

    public function update(array $request, $id): AcademicEducation
    {
        return $this->academicEducationRepository->update($id, $request);
    }

    public function delete($id): AcademicEducation
    {
        return $this->academicEducationRepository->delete($id);
    }

    public function restore($id): AcademicEducation
    {
        return $this->academicEducationRepository->restore($id);
    }

    public function forceDelete($id): AcademicEducation
    {
        return $this->academicEducationRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->academicEducationRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
