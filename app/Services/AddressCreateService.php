<?php

namespace App\Services;

use App\Models\Addresstravel;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AddressCreateService
{
    public function __construct(
        protected AddressService $addressService,
    ) {
        //
    }

    public function create(array $request)
    {
        //dd($request);
        try {
            DB::beginTransaction();
            $adres = $this->addressService->create($request);

            $address = Addresstravel::create(
                [
                'travel_id' => $request['travel_id'],
                'address_id' => $adres->id,
                'title' => $request['title'],
                'order' => $request['order'],
                ]
            );
            
            DB::commit();
        } catch (Exception $exception) {
            Bugsnag::notifyException($exception);
            DB::rollBack();
            throw new Exception($exception);
        }
        return $address;
    }
}
