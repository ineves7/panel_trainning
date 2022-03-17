<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PeopleRequest extends FormRequest
{
    /**
     * Determine if the People is authorized to make this request. 
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */


    public function rules()
    {
        return [
            'full_name'          => [
                'required',
                'min:3',
                'max:150'
            ],
            'genre'    => [
                'exclude_unless:person_type,pf',
                Rule::exists(Genre::class, 'id')
            ],
            'matrial_status'    => [
                'exclude_unless:person_type,pf',
                Rule::exists(MatrialStatus::class, 'id')
            ],
            'documents.document_type.*' => [
                Rule::exists(DocumentType::class, 'id'),
            ],
            'documents.document.*' => [
                Rule::unique(Document::class, 'document')
            ],
            'documents.expires_at.*' => [
                Rule::unique(Document::class, 'expires_at')
            ],
            //pj
            'company_name' => [
                'exclude_unless:person_type,pj',
                //'sometimes',
                'required',
            ],
            'legal_responsible' => [
                'exclude_unless:person_type,pj',
                //'sometimes',
                'required',
            ],
            //pf
            'name' => [
                'exclude_unless:person_type,pf',
                //'sometimes',
                'required',
            ],
//            'cpf' => [
//                'exclude_unless:person_type,pj',
////                'unique:App\Models\IndividualPerson,cpf',
//                //'sometimes',
//                'required',
//                new CPF,
//            ],
//            'rg' => [
//                'exclude_unless:person_type,pj',
////                'unique:App\Models\IndividualPerson,rg',
//                //'sometimes',
//                'required',
//            ],
            'birthdate'     => [
                'nullable',
                'date'
            ],
            'email' => [
                'required',
                'email',
            ],
            'phone' => [
                'nullable'
//                'required'
            ],
        ];
    }
    public function attributes()
    {
        return [
            'company_name'              => 'nome da empresa',
            'name'                      => 'nome',
            'genre'                     => 'genero',
            'matrial_status'            => 'estado civil',
            'documents.document.*'      => 'documento',
            'birthdate'                 => 'data de nascimento',
            'email'                     => 'email',
            'phone'                     => 'telefone',
        ];
    }
}
