<?php

namespace App\Services;

use App\Models\TravelAddress;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddressUpdateService
{
    // @codingStandardsIgnoreStart
    // TODO: CSFix
    public function __construct(
        protected AddressService $addressService,
        //protected TravelAddressService $travelAddressService,
    ) {
        //
    }
    
    public function update(array $request, $address_id)
    {
        try {
            DB::beginTransaction();
            
            $travel = TravelAddress::find($address_id);
            $this->addressService->update($request, $travel->address_id);

            $travel->title = $request['title'];
            $travel->order = $request['order'];

            $travel->save();

            DB::commit();
        } catch (Exception $exception) {
            Bugsnag::notifyException($exception);
            DB::rollBack();
            throw new Exception($exception);
        }
    }
}
