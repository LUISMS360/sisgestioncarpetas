<?php

namespace App\Http\Requests\Users;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'dni'=>'required|digits:8|unique:users,dni',
            'telefono'=>'required|digits:9|unique:users,telefono'       
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'=>'error',
            'message'=>'Error de validación',
            'error'=>$validator->errors()
        ],422));
    }
}
