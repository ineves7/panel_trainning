<?php

namespace App\Services;

use App\Models\IndividualPeople;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class IndividualPeopleService
{
    private RepositoryInterface $individualPeopleRepository;

    /**
     * IndividualPeopleService constructor.
     * @param RepositoryInterface $individualPeopleRepository
     */
    public function __construct(RepositoryInterface $individualPeopleRepository)
    {
        $this->individualPeopleRepository = $individualPeopleRepository;
    }

    public function get()
    {
        return $this->individualPeopleRepository->get();
    }

    public function create(array $request): IndividualPeople
    {
        return $this->individualPeopleRepository->create($request);
    }

    public function show($id): IndividualPeople
    {
        return $this->individualPeopleRepository->find($id);
    }

    public function update(array $request, $id): IndividualPeople
    {
        return $this->individualPeopleRepository->update($id, $request);
    }

    public function delete($id): IndividualPeople
    {
        return $this->individualPeopleRepository->delete($id);
    }

    public function restore($id): IndividualPeople
    {
        return $this->individualPeopleRepository->restore($id);
    }

    public function forceDelete($id): IndividualPeople
    {
        return $this->individualPeopleRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->individualPeopleRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
