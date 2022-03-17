<?php

namespace App\Services;

use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ExpenseTypeCreateService
{
    // @codingStandardsIgnoreStart
    // TODO: CSFix
    public function __construct(
        protected ExpenseTypeService $expenseTypeService,
    ) {
        //
    }
    // @codingStandardsIgnoreEndqqq


    public function create(array $request)
    {
        //dd($request);
        try {
            DB::beginTransaction();
            $this->expenseTypeService->create($request);

            DB::commit();
        } catch (Exception $exception) {
            Bugsnag::notifyException($exception);
            DB::rollBack();
            throw new Exception($exception);
        }
    }
}
