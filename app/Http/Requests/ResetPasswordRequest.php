<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|max:30|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('reset_password.required'),
            'email.email' => trans('reset_password.email'),
            'email.exists' => trans('reset_password.exists'),
            'password.required' => trans('reset_password.required'),
            'password.min' => trans('reset_password.min'),
            'password.max' => trans('reset_password.max'),
            'password.confirmed' => trans('reset_password.confirmed'),
        ];
    }
}
