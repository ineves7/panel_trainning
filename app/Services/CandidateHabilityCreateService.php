<?php

namespace App\Services;

use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CandidateHabilityCreateService
{
    // @codingStandardsIgnoreStart
    // TODO: CSFix
    public function __construct(
        protected CandidateHabilityService $candidateHabilityService,
    ) {
        //
    }
    // @codingStandardsIgnoreEndqqq

    public function create(array $request)
    {
        try {
            DB::beginTransaction();
            $this->candidateHabilityService->create($request);

            DB::commit();
        } catch (Exception $exception) {
            Bugsnag::notifyException($exception);
            DB::rollBack();
            dd($exception);
            throw new Exception($exception);
        }
    }
}
