<?php

namespace App\Http\Requests;

use App\Models\City;
use App\Models\Unit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UnitRequest extends FormRequest
{
    /**
     * Determine if the Unit is authorized to make this request. 
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
            'city_id'    => [
                Rule::exists(City::class, 'id')
            ],
            'name'          => [
                'required',
                'min:3',
                'max:150'
            ],
        ];
    }
    
    public function attributes()
    {
        return [
            'city_id'                 => 'cidade',
            'name'                     => 'nome',
        ];
    }
}
