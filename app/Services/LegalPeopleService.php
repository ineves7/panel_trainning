<?php

namespace App\Services;

use App\Models\LegalPeople;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class LegalPeopleService
{
    private RepositoryInterface $legalPeopleRepository;

    /**
     * LegalPeopleService constructor.
     * @param RepositoryInterface $legalPeopleRepository
     */
    public function __construct(RepositoryInterface $legalPeopleRepository)
    {
        $this->legalPeopleRepository = $legalPeopleRepository;
    }

    public function get()
    {
        return $this->legalPeopleRepository->get();
    }

    public function create(array $request): LegalPeople
    {
        return $this->legalPeopleRepository->create($request);
    }

    public function show($id): LegalPeople
    {
        return $this->legalPeopleRepository->find($id);
    }

    public function update(array $request, $id): LegalPeople
    {
        return $this->legalPeopleRepository->update($id, $request);
    }

    public function delete($id): LegalPeople
    {
        return $this->legalPeopleRepository->delete($id);
    }

    public function restore($id): LegalPeople
    {
        return $this->legalPeopleRepository->restore($id);
    }

    public function forceDelete($id): LegalPeople
    {
        return $this->legalPeopleRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->legalPeopleRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
