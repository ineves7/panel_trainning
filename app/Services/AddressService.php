<?php

namespace App\Services;

use App\Models\Address;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class AddressService
{
    private RepositoryInterface $addressRepository;

    /**
     * AddressService constructor.
     * @param RepositoryInterface $addressRepository
     */
    public function __construct(RepositoryInterface $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function get()
    {
        return $this->addressRepository->get();
    }

    public function create(array $request): Address
    {
        return $this->addressRepository->create($request);
    }

    public function show($id): Address
    {
        return $this->addressRepository->find($id);
    }

    public function update(array $request, $id): Address
    {
        return $this->addressRepository->update($id, $request);
    }

    public function delete($id): Address
    {
        return $this->addressRepository->delete($id);
    }

    public function restore($id): Address
    {
        return $this->addressRepository->restore($id);
    }

    public function forceDelete($id): Address
    {
        return $this->addressRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->addressRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
