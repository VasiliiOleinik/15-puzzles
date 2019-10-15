<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            'email-subscribe' => 'required|string|email:filter|max:191',
        ];
    }

    public function messages()
    {
        return [
            'email-subscribe.required' => trans('subscriber.email_required'),
            'email-subscribe.email' => trans('subscriber.email_email'),
            'email-subscribe.max' => trans('subscriber.email_max'),
        ];
    }
}
