<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqFormRequest extends FormRequest
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
            'name' => 'required|string',
            'phone' => 'required|string|min:10|max:13',
            'email' => 'required|string|email:filter|max:191',
            'letter' => 'required|string|min:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('faq.name_required'),
            'phone.required' => trans('faq.phone_required'),
            'phone.min' => trans('faq.phone_min'),
            'phone.max' => trans('faq.phone_max'),
            'email.required' => trans('faq.email_required'),
            'email.email' => trans('faq.email_email'),
            'email.max' => trans('faq.email_max'),
            'letter.required' => trans('faq.letter_required'),
            'letter.min' => trans('faq.letter_min'),
        ];
    }
}
