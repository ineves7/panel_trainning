<?php

namespace App\Services;

use App\Models\DocumentType;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class DocumentTypeService
{
    private RepositoryInterface $documentTypeRepository;

    public function __construct(RepositoryInterface $documentTypeRepository)
    {
        $this->documentTypeRepository = $documentTypeRepository;
    }

    public function get()
    {
        return $this->documentTypeRepository->get();
    }

    /*public function getQueryBuilder(): Builder
    {
        return $this->documentTypeRepository->getQueryBuilder();
    }*/

    public function create(array $request): DocumentType
    {
        return $this->documentTypeRepository->create($request);
    }

    public function show($id): DocumentType
    {
        return $this->documentTypeRepository->find($id);
    }

    public function update(array $request, $id): DocumentType
    {
        return $this->documentTypeRepository->update($id, $request);
    }

    public function delete($id): DocumentType
    {
        return $this->documentTypeRepository->delete($id);
    }

    public function restore($id): DocumentType
    {
        return $this->documentTypeRepository->restore($id);
    }

    public function forceDelete($id): DocumentType
    {
        return $this->documentTypeRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->documentTypeRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
