<?php

namespace App\Services;

use App\Models\People;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PeopleUpdateService
{
    // TODO: verificar imagem , editar user
    public function __construct(
        protected UserService $userService,
        protected IndividualPeopleService $individualPeopleService,
        protected LegalPeopleService $legalPeopleService,
        protected DocumentService $documentService,
        protected PeopleService $peopleService,
        protected EmailService $emailService,
        protected PhoneService $phoneService,
        protected AddressService $addressService,
    ) {
        //
    }
    
    public function update(array $request, $people_id)
    {
        try {
            DB::beginTransaction();

            
            $userData = array_merge(
                $request,
                [
                    'full_name'      => $request['full_name'] ?? $request['company_name']
                ]
            );
            $person = People::find($people_id);

            $this->peopleService->update($userData, $people_id);
            match ('pf') {
                'pj' => $this->legalPeopleService->update($userData, $person->peopleable_id),
                'pf' => $this->individualPeopleService->update($request, $person->peopleable_id),
            default => throw new Exception('Tipo de pessoal não selecionado')
            };

            //dd($userData['documents']);
            foreach ($request['documents']['document_type'] as $key => $documents) {
                $documentId = $request['documents']['id'][$key];
                if ($request['documents']['document'][$key]) {
                    $this->documentService->update(
                        [
                        'document_type_id' => $request['documents']['document_type'][$key],
                        'document' => $request['documents']['document'][$key],
                        ], $documentId
                    );
                }
            }
            
            foreach ($request['phones']['phone'] as $key => $phones) {
                $phoneId = $request['phones']['id'][$key];
                if ($request['phones']['phone'][$key]) {
                    $this->phoneService->update(
                        [
                        'phone' => $request['phones']['phone'][$key],
                        ], $phoneId
                    );
                }
            }
            
            //tratando address como se fosse único, pq vai aparecer sempre como único
            $this->addressService->update($userData, $userData['address_id']);

            DB::commit();
        } catch (Exception $exception) {
            //Bugsnag::notifyException($exception);
            DB::rollBack();
            dd($exception);
            throw new Exception($exception);
        }
    }
}
