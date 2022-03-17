<?php

namespace App\Http\Requests;

use App\Models\DocumentType;
use App\Models\People;
use App\Models\Document;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DocumentCreateRequest extends FormRequest
{
    /**
     * Determine if the Document is authorized to make this request. 
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
            'document'          => [
                'required',
                'min:3',
                'max:150'
            ],
            'document_type_id'    => [
                Rule::exists(DocumentType::class, 'id')
            ],
        ];
    }
    
    public function attributes()
    {
        return [
            'document'                    => 'documento',
            'document_type_id'            => 'tipo de documento',
        ];
    }
}
