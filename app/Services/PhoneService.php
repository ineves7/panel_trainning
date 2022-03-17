<?php

namespace App\Services;

use App\Models\Phone;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class PhoneService
{
    private RepositoryInterface $phoneRepository;

    /**
     * PhoneService constructor.
     * @param RepositoryInterface $phoneRepository
     */
    public function __construct(RepositoryInterface $phoneRepository)
    {
        $this->phoneRepository = $phoneRepository;
    }

    public function get()
    {
        return $this->phoneRepository->get();
    }

    public function create(array $request): Phone
    {
        return $this->phoneRepository->create($request);
    }

    public function show($id): Phone
    {
        return $this->phoneRepository->find($id);
    }

    public function update(array $request, $id): Phone
    {
        return $this->phoneRepository->update($id, $request);
    }

    public function delete($id): Phone
    {
        return $this->phoneRepository->delete($id);
    }

    public function restore($id): Phone
    {
        return $this->phoneRepository->restore($id);
    }

    public function forceDelete($id): Phone
    {
        return $this->phoneRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->phoneRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
