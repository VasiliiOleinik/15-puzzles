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
            'email_subscribe' => 'required|email:filter|max:191|unique:subscribers,email',
        ];
    }

    public function messages()
    {
        app()->setLocale($this->local);
        return [
            'email_subscribe.required' => trans('subscriber.email_required'),
            'email_subscribe.email' => trans('subscriber.email_email'),
            'email_subscribe.max' => trans('subscriber.email_max'),
            'email_subscribe.unique' => trans('subscriber.already_subscribed'),
        ];
    }
}
