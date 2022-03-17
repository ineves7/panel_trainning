<?php

namespace App\Services;

use App\Models\People;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class PeopleService
{
    private RepositoryInterface $peopleRepository;

    /**
     * PeopleService constructor.
     * @param RepositoryInterface $peopleRepository
     */
    public function __construct(RepositoryInterface $peopleRepository)
    {
        $this->peopleRepository = $peopleRepository;
    }

    public function get()
    {
        return $this->peopleRepository->get();
    }

    public function create(array $request): People
    {
        return $this->peopleRepository->create($request);
    }

    public function show($id): People
    {
        return $this->peopleRepository->find($id);
    }

    public function update(array $request, $id): People
    {
        return $this->peopleRepository->update($id, $request);
    }

    public function delete($id): People
    {
        return $this->peopleRepository->delete($id);
    }

    public function restore($id): People
    {
        return $this->peopleRepository->restore($id);
    }

    public function forceDelete($id): People
    {
        return $this->peopleRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->peopleRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
