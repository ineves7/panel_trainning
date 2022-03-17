<?php

namespace App\Http\Requests;

use App\Models\NotificationStatus;
use App\Models\NotificationType;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NotificationRequest extends FormRequest
{
    /**
     * Determine if the Notification is authorized to make this request. 
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
            'type_id'    => [
                Rule::exists(NotificationType::class, 'id')
            ],
            'status_id'    => [
                Rule::exists(NotificationStatus::class, 'id')
            ],
            'sender_id'    => [
                Rule::exists(User::class, 'id')
            ],
            'title'          => [
                'required',
                'max:150'
            ],
            'content'          => [
            ],
            'scheduled_at'     => [
                'nullable',
                'date'
            ],
        ];
    }
    public function attributes()
    {
        return [
            'type_id'                       => 'tipo',
            'status_id'                       => 'status_id',
            'sender_id'                       => 'sender_id',
            'title'                         => 'título',
            'content'                       => 'conteúdo',
            'scheduled_at'                  => 'agendado',
        ];
    }
}
