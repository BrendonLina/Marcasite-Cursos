<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:25',
            'value' => 'required|numeric|min:0|max:9999999999.99',
            'vacancies' => 'required|numeric|min:1|max:9999999999.99',
            'registrations' => 'required|date|after_or_equal:today',
            'registrations_up_to' => 'required|date|after_or_equal:today',
            'description' => 'required|min:3|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
