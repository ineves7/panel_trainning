<?php

namespace App\Services;

use App\Models\ExpenseType;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class ExpenseTypeService
{
    private RepositoryInterface $expenseTypeRepository;

    /**
     * ExpenseTypeService constructor.
     * @param RepositoryInterface $expenseTypeRepository
     */
    public function __construct(RepositoryInterface $expenseTypeRepository)
    {
        $this->expenseTypeRepository = $expenseTypeRepository;
    }

    public function get()
    {
        return $this->expenseTypeRepository->get();
    }

    public function create(array $request): ExpenseType
    {
        return $this->expenseTypeRepository->create($request);
    }

    public function show($id): ExpenseType
    {
        return $this->expenseTypeRepository->find($id);
    }

    public function update(array $request, $id): ExpenseType
    {
        return $this->expenseTypeRepository->update($id, $request);
    }

    public function delete($id): ExpenseType
    {
        return $this->expenseTypeRepository->delete($id);
    }

    public function restore($id): ExpenseType
    {
        return $this->expenseTypeRepository->restore($id);
    }

    public function forceDelete($id): ExpenseType
    {
        return $this->expenseTypeRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->expenseTypeRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
