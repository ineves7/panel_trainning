<?php

namespace App\Services;

use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CandidateStudyCreateService
{
    // @codingStandardsIgnoreStart
    // TODO: CSFix
    public function __construct(
        protected CandidateStudyService $candidateStudyService,
    ) {
        //
    }
    // @codingStandardsIgnoreEndqqq

    public function create(array $request)
    {
        try {
            DB::beginTransaction();
            $this->candidateStudyService->create($request);

            DB::commit();
        } catch (Exception $exception) {
            Bugsnag::notifyException($exception);
            DB::rollBack();
            throw new Exception($exception);
        }
    }
}
