<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberCaseRequest extends FormRequest
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
            'headline' => 'required|string|max:191',
            'your-story' => 'required|string|min:17',
            'image-file' => 'nullable',
            'story-tags' => 'required',
            'anonym' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'headline.required' => trans('member_cases.enter_headline'),
            'headline.max' => trans('member_cases.headline_too_long'),
            'your-story.required' => trans('member_cases.enter_your_story'),
            'your-story.min' => trans('member_cases.your_story_too_short'),
            'story-tags.required' => trans('member_cases.your_story_tags'),
        ];
    }
}
