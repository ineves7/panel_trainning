<?php

namespace App\Http\Requests;

use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Email;
use App\Models\Genre;
use App\Models\MatrialStatus;
use App\Models\People;
use App\Models\Phone;
use App\Models\Profession;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Rules\CPF;

class PeopleUpdateRequest extends FormRequest
{
    /**
     * Determine if the people is authorized to make this request. 
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //return Auth::user()->isEmployee() ?? false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'name'          => [
                'exclude_unless:person_type,pf',
                'required',
                'min:3',
                'max:150'
            ],
            'social_name'          => [
                'max:300'
            ],
            'profession'    => [
                Rule::exists(Profession::class, 'id')
            ],
            'genre'    => [
                'exclude_unless:person_type,pf',
                Rule::exists(Genre::class, 'id')
            ],
            'matrial_status'    => [
                'exclude_unless:person_type,pf',
                Rule::exists(MatrialStatus::class, 'id')
            ],
            /*'documents.document.*' => [
                Rule::unique(Document::class, 'document')
            ],
            'documents.expires_at.*' => [
                Rule::unique(Document::class, 'expires_at')
            ],*/
            //pj
            'company_name' => [
                'exclude_unless:person_type,pj',
                'required',
            ],
            'legal_responsible' => [
                'exclude_unless:person_type,pj',
                'required',
            ],
            //pf
            'birthdate'     => [
                'nullable',
                'date'
            ],
            /*'emails.email.*' => [
                Rule::unique(Email::class, 'email')
            ],
            'phones.phone.*' => [
                Rule::unique(Phone::class, 'phone')
            ],*/
        ];
    }
    public function attributes()
    {
        return [
            'company_name'              => 'nome da empresa',
            'name'                      => 'nome',
            'social_name'                      => 'nome social',
            'profession'                => 'profissao',
            'genre'                     => 'genero',
            'matrial_status'            => 'estado civil',
            'documents.document.*'      => 'documento',
            'birthdate'                 => 'data de nascimento',
            'emails.email*'             => 'email',
            'phones.phone*'             => 'telefone',
        ];
    }
}
