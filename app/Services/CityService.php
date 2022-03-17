<?php

namespace App\Services;

use App\Models\City;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class CityService
{
    private RepositoryInterface $cityRepository;

    /**
     * CityService constructor.
     * @param RepositoryInterface $cityRepository
     */
    public function __construct(RepositoryInterface $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function get()
    {
        return $this->cityRepository->get();
    }

    public function create(array $request): City
    {
        return $this->cityRepository->create($request);
    }

    public function show($id): City
    {
        return $this->cityRepository->find($id);
    }

    public function update(array $request, $id): City
    {
        return $this->cityRepository->update($id, $request);
    }

    public function delete($id): City
    {
        return $this->cityRepository->delete($id);
    }

    public function restore($id): City
    {
        return $this->cityRepository->restore($id);
    }

    public function forceDelete($id): City
    {
        return $this->cityRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->cityRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
