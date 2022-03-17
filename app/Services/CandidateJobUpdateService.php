<?php

namespace App\Services;

use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CandidateJobUpdateService
{
    // @codingStandardsIgnoreStart
    // TODO: CSFix
    public function __construct(
        protected CandidateJobService $candidateJobService,
    ) {
        //
    }
    
    public function update(array $request)
    {
        try {
            DB::beginTransaction();
            
            $this->candidateJobService->update($request, $request['candidate_job_id']);

            DB::commit();
        } catch (Exception $exception) {
            Bugsnag::notifyException($exception);
            DB::rollBack();
            throw new Exception($exception);
        }
    }
}
