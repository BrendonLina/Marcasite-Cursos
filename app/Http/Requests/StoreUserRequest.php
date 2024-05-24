<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'cpf' => ['required', 'min:11', 'max:11', 'regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/'],
        ];
    }
}
