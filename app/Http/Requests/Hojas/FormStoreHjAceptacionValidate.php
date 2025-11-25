<?php

namespace App\Http\Requests\Hojas;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FormStoreHjAceptacionValidate extends FormRequest
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
            'carpeta_id'=>'required|integer|exists:carpetas,id',
            'fecha'=>'required|date',
            'razon_social_empresa'=>'required|string|max:255',
            'direccion'=>'required|string|max:255',
            'pais'=>'required|string|max:20',
            'ciudad'=>'required|string|max:20',
            'lugar'=>'required|string|max:100',
            'telefono'=>'required|digits:9',
            'encargado_control_practicas'=>'required|string|max:100',
            'vacantes_otorgadas'=>'required|integer|max:10',
            'nro_practica'=>'required|string|max:100',
            'carrera_profesional'=>'required|string|max:20',
            'periodo_inicial'=>'required|date|before:periodo_final',
            'periodo_final'=>'required|date|after:periodo_inicial',
            'horario'=>'nullable|string',
            'observaciones'=>'nullable|string',
            'pago_por_practicas'=>'required|accepted',
            'movilidad'=>'required|accepted',
            'otros'=>'required|accepted',
            'solo_practicas'=>'required|accepted',
            'compromiso_con_empresa'=>'required|accepted',
            'compromiso_seguro'=>'required|accepted',
            'firma_encargado'=>'nullable|image',
            'firma_empresa'=>'required|image',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'=>'error',
            'message'=>'Validacion fallida',
            'errors'=> $validator->errors()
        ],422));
    }
}
