<?php

namespace App\Services;

use App\Models\Document;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class DocumentService
{
    private RepositoryInterface $documentRepository;

    public function __construct(RepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function get()
    {
        return $this->documentRepository->get();
    }

    /*public function getQueryBuilder(): Builder
    {
        return $this->documentRepository->getQueryBuilder();
    }*/

    public function create(array $request): Document
    {
        return $this->documentRepository->create($request);
    }

    public function show($id): Document
    {
        return $this->documentRepository->find($id);
    }

    public function update(array $request, $id): Document
    {
        return $this->documentRepository->update($id, $request);
    }

    public function delete($id): Document
    {
        return $this->documentRepository->delete($id);
    }

    public function restore($id): Document
    {
        return $this->documentRepository->restore($id);
    }

    public function forceDelete($id): Document
    {
        return $this->documentRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->documentRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
