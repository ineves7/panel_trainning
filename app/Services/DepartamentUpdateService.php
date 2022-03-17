<?php

namespace App\Services;

use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepartamentUpdateService
{
    // @codingStandardsIgnoreStart
    // TODO: CSFix
    public function __construct(
        protected UserService $userService,
        protected PeopleService $peopleService,
        protected DepartamentService $departamentService,
    ) {
        //
    }
    
    public function update(array $request, $departament_id)
    {
        try {
            DB::beginTransaction();
            
            $this->departamentService->update($request, $departament_id);

            DB::commit();
        } catch (Exception $exception) {
            //Bugsnag::notifyException($exception);
            DB::rollBack();
            throw new Exception($exception);
        }
    }
}
