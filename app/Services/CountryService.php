<?php

namespace App\Services;

use App\Models\Country;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class CountryService
{
    private RepositoryInterface $cityRepository;

    /**
     * CityService constructor.
     * @param RepositoryInterface $cityRepository
     */
    public function __construct(RepositoryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function get()
    {
        return $this->countryRepository->get();
    }

    public function create(array $request): Country
    {
        return $this->countryRepository->create($request);
    }

    public function show($id): Country
    {
        return $this->countryRepository->find($id);
    }

    public function update(array $request, $id): Country
    {
        return $this->countryRepository->update($id, $request);
    }

    public function delete($id): Country
    {
        return $this->countryRepository->delete($id);
    }

    public function restore($id): Country
    {
        return $this->countryRepository->restore($id);
    }

    public function forceDelete($id): Country
    {
        return $this->countryRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->countryRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
