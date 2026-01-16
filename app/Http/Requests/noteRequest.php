<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class noteRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'title.required' => 'The title is required',
            'title.max' => 'The title must not exceed 2 characters',
            'description.required' => 'The description is required',
        ];
    }

    public function rules()
    {
        return [
            'title' => 'required|max:2',
            'description' => 'required',
        ];
    }
}
