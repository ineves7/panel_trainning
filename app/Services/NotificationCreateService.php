<?php

namespace App\Services;

use App\Models\NotificationUser;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NotificationCreateService
{
    // @codingStandardsIgnoreStart
    // TODO: CSFix
    public function __construct(
        protected NotificationService $notificationService,
        protected NotificationUserService $notificationUserService,
    ) {
        //
    }
    // @codingStandardsIgnoreEnd

    public function create(array $request)
    {
        try {
            DB::beginTransaction();
            $notification = $this->notificationService->create($request);
            foreach ($request['users'] as $user) {
                NotificationUser::create(
                    [
                    'notification_id' => $notification->id,
                    'user_id' => $user,
                    ]
                );
            }

            DB::commit();
        } catch (Exception $exception) {
            dd($exception);
            //Bugsnag::notifyException($exception);
            DB::rollBack();
            throw new Exception($exception);
        }
    }
}
