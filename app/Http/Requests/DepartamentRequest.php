<?php

namespace App\Http\Requests;

use App\Models\Unit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DepartamentRequest extends FormRequest
{
    /**
     * Determine if the Departament is authorized to make this request. 
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
            'departament'          => [
                'required',
                'min:3',
                'max:150'
            ],
            'code'          => [
                'min:1',
                'max:150'
            ],
            'sigla'          => [
                'required',
                'min:1',
                'max:150'
            ],
            'unit_id'    => [
                'required',
                Rule::exists(Unit::class, 'id')
            ],
        ];
    }
    
    public function attributes()
    {
        return [
            'departament'                 => 'departamento',
            'code'                 => 'code',
            'sigla'                 => 'sigla',
            'unit_id'                 => 'unidade',
            'responsible'                     => 'responsavel',
            'phone'                     => 'celular',
            'email'                     => 'email',
        ];
    }
}
