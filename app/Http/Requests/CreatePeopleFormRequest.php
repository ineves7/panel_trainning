<?php

namespace App\Http\Requests;

use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Email;
use App\Models\People;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Rules\CPF;

class CreatePeopleFormRequest extends FormRequest
{
    /**
     * Determine if the people is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'documents.document_type.*' => [
                Rule::exists(DocumentType::class, 'id'),
            ],
            'documents.document.*' => [
                Rule::unique(Document::class, 'document')
            ],
            //pf
            'name' => [
                'exclude_unless:people_type,pf',
                //'sometimes',
                'required',
            ],
            'birthdate' => [
                'exclude_unless:people_type,pj',
                //'sometimes',
                'date',
            ],
            'email' => [
                Rule::unique(Email::class, 'email'),
                Rule::unique(People::class, 'email'),
                'required',
                'email',
            ],
            'phone' => [
                'nullable'
                //'required'
            ],
        ];
    }

    public function attributes()
    {
        return [
            'document_type'             => 'tipo de pessoa',
            'category'                  => 'seguimento',
            'name'                      => 'nome',
            'documents.document.*'      => 'documento',
            'birthdate'                 => 'data de nascimento',
            'email'                     => 'email',
            'phone'                     => 'telefone',
        ];
    }
}
