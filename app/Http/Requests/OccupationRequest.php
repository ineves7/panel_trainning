<?php

namespace App\Http\Requests;

use App\Models\Departament;
use App\Models\Unit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class OccupationRequest extends FormRequest
{
    /**
     * Determine if the Occupation is authorized to make this request. 
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
            'title'          => [
                'required',
                'min:3',
                'max:150'
            ],
            'departament_id'    => [
                Rule::exists(Departament::class, 'id')
            ],
            'active'          => [
            ],
        ];
    }
    
    public function attributes()
    {
        return [
            'title'                 => 'ocupação',
            'departament_id'                 => 'departamento',
            'active'                 => 'active',
        ];
    }
}
