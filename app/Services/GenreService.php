<?php

namespace App\Services;

use App\Models\Genre;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class GenreService
{
    private RepositoryInterface $genreRepository;

    public function __construct(RepositoryInterface $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    public function get()
    {
        return $this->genreRepository->get();
    }

    /*public function getQueryBuilder(): Builder
    {
        return $this->genreRepository->getQueryBuilder();
    }*/

    public function create(array $request): Genre
    {
        return $this->genreRepository->create($request);
    }

    public function show($id): Genre
    {
        return $this->genreRepository->find($id);
    }

    public function update(array $request, $id): Genre
    {
        return $this->genreRepository->update($id, $request);
    }

    public function delete($id): Genre
    {
        return $this->genreRepository->delete($id);
    }

    public function restore($id): Genre
    {
        return $this->genreRepository->restore($id);
    }

    public function forceDelete($id): Genre
    {
        return $this->genreRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->genreRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
