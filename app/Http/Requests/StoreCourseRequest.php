<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'is_active' => 'required|min:3|max:25',
            'image' => 'required|min:3|max:25',
        ];
    }
}
