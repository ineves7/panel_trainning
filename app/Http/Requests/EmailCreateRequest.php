<?php

namespace App\Http\Requests;

use App\Models\People;
use App\Models\Email;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class EmailCreateRequest extends FormRequest
{
    /**
     * Determine if the Email is authorized to make this request. 
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
            'email'          => [
                'required',
                'min:3',
                'max:150'
            ],
            'people_id'    => [
                Rule::exists(People::class, 'id')
            ],
        ];
    }
    
    public function attributes()
    {
        return [
            'email'                    => 'E-mail',
            'people_id'                => 'pessoa',
            'type_'                    => 'tipo de E-mail',
        ];
    }
}
