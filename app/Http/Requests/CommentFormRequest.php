<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentFormRequest extends FormRequest
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
            'add-comm' => 'required|string|min:3',
            'member-case-id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'add-comm.required' => trans('member_cases.comment_required'),
            'add-comm.min' => trans('member_cases.comment_min'),
        ];
    }
}
