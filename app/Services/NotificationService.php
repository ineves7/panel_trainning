<?php

namespace App\Services;

use App\Models\Notification;
use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class NotificationService
{
    private RepositoryInterface $notificationRepository;

    /**
     * NotificationService constructor.
     * @param RepositoryInterface $notificationRepository
     */
    public function __construct(RepositoryInterface $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    public function get()
    {
        return $this->notificationRepository->get();
    }

    public function create(array $request): Notification
    {
        return $this->notificationRepository->create($request);
    }

    public function show($id): Notification
    {
        return $this->notificationRepository->find($id);
    }

    public function update(array $request, $id): Notification
    {
        return $this->notificationRepository->update($id, $request);
    }

    public function delete($id): Notification
    {
        return $this->notificationRepository->delete($id);
    }

    public function restore($id): Notification
    {
        return $this->notificationRepository->restore($id);
    }

    public function forceDelete($id): Notification
    {
        return $this->notificationRepository->forceDelete($id);
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): Paginator
    {
        return $this->notificationRepository->paginate($perPage, $columns, $pageName, $page);
    }
}
