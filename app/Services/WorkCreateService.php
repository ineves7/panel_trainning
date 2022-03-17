<?php

namespace App\Services;

use App\Models\CandidateHabilityWork;
use App\Models\Vacancy;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WorkCreateService
{
    // @codingStandardsIgnoreStart
    // TODO: CSFix
    public function __construct(
        protected WorkService $WorkService,
    ) {
        //
    }
    // @codingStandardsIgnoreEndqqq

    public function create(array $request)
    {
        try {
            DB::beginTransaction();
            $work = $this->WorkService->create($request);
            
            Vacancy::create(
                [
                'hirer_id' => $request['hirer_id'],
                'work_id' => $work->id,
                ]
            );

            foreach ($request['candidate_habilities'] as  $candidate_hability) {
                $candidate_hability_id = $candidate_hability;
                
                CandidateHabilityWork::create([
                    'candidate_hability_id' => $candidate_hability_id,
                    'work_id' => $work->id,
                ]);
            }

            DB::commit();
        } catch (Exception $exception) {
            Bugsnag::notifyException($exception);
            DB::rollBack();
            throw new Exception($exception);
        }
    }
}
