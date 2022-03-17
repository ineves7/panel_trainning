<?php

namespace App\Services;

use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmailCreateService
{
    // @codingStandardsIgnoreStart
    // TODO: CSFix
    public function __construct(
        protected UserService $userService,
        protected PeopleService $peopleService,
        protected EmailService $emailService,
    ) {
        //
    }
    // @codingStandardsIgnoreEndqqq

    public function create(array $request)
    {
        try {
            DB::beginTransaction();
            $this->emailService->create($request);

            DB::commit();
        } catch (Exception $exception) {
            Bugsnag::notifyException($exception);
            DB::rollBack();
            throw new Exception($exception);
        }
    }
}
