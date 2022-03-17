<?php

namespace App\Services;

use App\Models\Email;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class EmailService
{
    private RepositoryInterface $emailRepository;

    /**
     * EmailService constructor.
     * @param RepositoryInterface $emailRepository
     */
    public function __construct(RepositoryInterface $emailRepository)
    {
        $this->emailRepository = $emailRepository;
    }

    public function get()
    {
        return $this->emailRepository->get();
    }

    public function create(array $request): Email
    {
        return $this->emailRepository->create($request);
    }

    public function show($id): Email
    {
        return $this->emailRepository->find($id);
    }

    public function update(array $request, $id): Email
    {
        return $this->emailRepository->update($id, $request);
    }

    public function delete($id): Email
    {
        return $this->emailRepository->delete($id);
    }

    public function restore($id): Email
    {
        return $this->emailRepository->restore($id);
    }

    public function forceDelete($id): Email
    {
        return $this->emailRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->emailRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
