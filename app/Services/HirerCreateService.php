<?php

namespace App\Services;

use App\Models\AddressPeople;
use App\Models\Vacancy;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HirerCreateService
{
    // @codingStandardsIgnoreStart
    // TODO: CSFix
    public function __construct(
        protected HirerService $HirerService,
        protected PeopleService $peopleService,
        protected IndividualPeopleService $individualPeopleService,
        protected LegalPeopleService $legalPeopleService,
        protected EmailService $emailService,
        protected PhoneService $phoneService,
        protected AddressService $addressService,
    ) {
        //
    }
    // @codingStandardsIgnoreEnd

    public function create(array $request)
    {
        try {
            DB::beginTransaction();
            $userData = array_merge(
                $request,
                [
                    'password'  => Str::random(8),
                    'name'      => $request['name'] ?? $request['company_name']
                ]
            );
            $people = match ($request['people_type']) {
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
                'city_id' => $request['city'],
                ]
            );

            AddressPeople::create(
                [
                'people_id' => $people_id,
                'address_id' => $address->id,
                ]
            );

            $hirerData = array_merge(
                $request,
                [
                    'people_id'  => $people_id
                ]
            );

            $this->HirerService->create($hirerData);

            DB::commit();
        } catch (Exception $exception) {
            Bugsnag::notifyException($exception);
            DB::rollBack();
            throw new Exception($exception);
        }
    }
}
