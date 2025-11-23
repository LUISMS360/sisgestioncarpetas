<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class FormStoreUserValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|max:20|min:3',
            'email'=>'required|email:rfc,dns|unique:users,email',
            'password'=>'required|min:8',
            'rol'=>'required|in:admin,profesor,estudiante,egresado',            
        ];
    }
}
