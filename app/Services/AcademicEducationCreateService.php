<?php

namespace App\Services;

use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AcademicEducationCreateService
{
    // @codingStandardsIgnoreStart
    // TODO: CSFix
    public function __construct(
        protected AcademicEducationService $academicEducationService,
    ) {
        //
    }
    // @codingStandardsIgnoreEndqqq

    public function create(array $request)
    {
        try {
            DB::beginTransaction();
            $this->academicEducationService->create($request);

            DB::commit();
        } catch (Exception $exception) {
            Bugsnag::notifyException($exception);
            DB::rollBack();
            throw new Exception($exception);
        }
    }
}
