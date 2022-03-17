<?php

namespace App\Services;

use App\Models\NotificationUser;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class NotificationUserService
{
    private RepositoryInterface $notificationuserRepository;

    /**
     * NotificationUserService constructor.
     * @param RepositoryInterface $notificationuserRepository
     */
    public function __construct(RepositoryInterface $notificationuserRepository)
    {
        $this->notificationUserRepository = $notificationuserRepository;
    }

    public function get()
    {
        return $this->notificationUserRepository->get();
    }

    public function create(array $request): NotificationUser
    {
        return $this->notificationUserRepository->create($request);
    }

    public function show($id): NotificationUser
    {
        return $this->notificationUserRepository->find($id);
    }

    public function update(array $request, $id): NotificationUser
    {
        return $this->notificationUserRepository->update($id, $request);
    }

    public function delete($id): NotificationUser
    {
        return $this->notificationUserRepository->delete($id);
    }

    public function restore($id): NotificationUser
    {
        return $this->notificationUserRepository->restore($id);
    }

    public function forceDelete($id): NotificationUser
    {
        return $this->notificationUserRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->notificationUserRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
