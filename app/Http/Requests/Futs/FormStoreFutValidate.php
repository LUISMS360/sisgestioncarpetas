<?php

namespace App\Http\Requests\Futs;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FormStoreFutValidate extends FormRequest
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
            'resumen_solicitud'=>'required|string|max:255',
            'datos_del_solicitante'=>'required|string|max:255',
            'nombres_apellidos'=>'required|string|max:255',
            'documento_identidad'=>'required|digits:8|exists:users,dni',
            'razon_social'=>'nullable|string|max:255',
            'ruc'=>'nullable|digits:11',
            'telefonos'=>'required|digits:9',
            'correo'=>'required|email:rfc,dns',
            'domicilio'=>'required|string|max:255',
            'cargo_actual'=>'required|in:estudiante,egresado,otros',
            'carrera_profesional' => 'required|in:computacion_informatica,dsi',
            'anio_egresado'=>'nullable|string',
            'fundamentacion_pedido'=>'required|string|max:255',
            'documentos_adjuntados'=>'required|string|max:255',
            'fecha'=>'required|date',
            'lugar'=>'required|string|max:100',
            'firma'=>'required|string|max:200',
            'turno'=>'nullable|in:dia,noche',
            'ciclo'=>'nullable|in:I,II,III,IV,V,VI',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => 'Validación fallida',
            'errors' => $validator->errors()
        ], 422));
    }
}
