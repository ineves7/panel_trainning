<?php

namespace App\Services;

use App\Models\AddressPeople;
use App\Models\DepartamentPeople;
use App\Models\OccupationUser;
use App\Models\PeopleAddress;
use App\Models\User;
//use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;

class PeopleCreateService
{
    // @codingStandardsIgnoreStart
    // TODO: CSFix
    public function __construct(
        protected UserService $userService,
        protected IndividualPeopleService $individualPeopleService,
        protected LegalPeopleService $legalPeopleService,
        protected PeopleService $peopleService,
        protected EmailService $emailService,
        protected PhoneService $phoneService,
        protected AddressService $addressService,
    ) {
        //
    }
    // @codingStandardsIgnoreEnd

    public function create(array $request)
    {
        //dd($request);
        try {
            DB::beginTransaction();
            $userData = array_merge(
                $request,
                [
                    'full_name'      => $request['full_name'] ?? $request['company_name']
                ]
            );
            
            $people = match ('pf') {
                'pj' => $this->legalPeopleService->create($userData),
                'pf' => $this->individualPeopleService->create($request),
            default => throw new Exception('Tipo de pessoal não selecionado')
            };
            
                $people->peopleable()->create($userData);
                foreach ($request['documents']['document_type'] as $key => $documents) {
                    if ($request['documents']['document'][$key]) {
                        $people->peopleable->documents()->create(
                            [
                            'document_type_id' => $request['documents']['document_type'][$key],
                            'document' => $request['documents']['document'][$key],
                            ]
                        );
                    }
                }

                $people_id = $people->peopleable->id;

                $user = User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'people_id' => $people_id,
                    'password' => Hash::make($request['password']),
                    'profile_photo_path' => $request['profile_photo_path']
                ]);
                event(new Registered($user));

                $email = $this->emailService->create(
                    array_merge(
                        $request,
                        $userData,
                        compact('people_id')
                    )
                );

                $phone = $this->phoneService->create(
                    array_merge(
                        $request,
                        $userData,
                        compact('people_id')
                    )
                );

                $address = $this->addressService->create(
                    [
                    'street' => $request['street'],
                    'complement' => $request['complement'],
                    'number' => $request['number'],
                    'postal_code' => $request['postal_code'],
                    'neighborhood' => $request['neighborhood'],
                    'city_id' => $request['city_id'],
                    ]
                );

                AddressPeople::create(
                    [
                    'people_id' => $people_id,
                    'address_id' => $address->id,
                    ]
                );

                if(isset($request['departament_id'])){
                    DepartamentPeople::create(
                        [
                        'departament_id' => $request['departament_id'],
                        'people_id' => $people_id,
                        ]
                    );
                }
                
                if(isset($request['occupation_id'])){
                    OccupationUser::create(
                        [
                        'user_id' => $user->id,
                        'occupation_id' => $request['occupation_id'],
                        ]
                    );
                }
            DB::commit();
        } catch (Exception $exception) {
            //Bugsnag::notifyException($exception);
            dd($exception);
            DB::rollBack();
            throw new Exception($exception);
        }
    }
}
