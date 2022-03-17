<?php

namespace App\Http\Requests;

use App\Models\People;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the Employee is authorized to make this request. 
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
            'registry'    => [
            ],
            'people_id'    => [
                Rule::exists(People::class, 'id')
            ],
            'departament_id'    => [
                Rule::exists(People::class, 'id')
            ],
        ];
    }
    
    public function attributes()
    {
        return [
            'registry'                 => 'registro',
            'people_id'                 => 'pessoa',
            'departament_id'                 => 'departamento',
        ];
    }
}
