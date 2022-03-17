<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class UserService
{
    private RepositoryInterface $userRepository;

    /**
     * UserService constructor.
     * @param RepositoryInterface $userRepository
     */
    public function __construct(RepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function get()
    {
        return $this->userRepository->get();
    }

    public function create(array $request): User
    {
        return $this->userRepository->create($request);
    }

    public function show($id): User
    {
        return $this->userRepository->find($id);
    }

    public function update(array $request, $id): User
    {
        return $this->userRepository->update($id, $request);
    }

    public function delete($id): User
    {
        return $this->userRepository->delete($id);
    }

    public function restore($id): User
    {
        return $this->userRepository->restore($id);
    }

    public function forceDelete($id): User
    {
        return $this->userRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->userRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
