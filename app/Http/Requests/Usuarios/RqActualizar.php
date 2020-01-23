<?php

namespace gym\Http\Requests\Usuarios;

use Illuminate\Foundation\Http\FormRequest;

class RqActualizar extends FormRequest
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
            'id'=>'required',
            'email'=>'required|string|email|max:255|unique:users,email,'.$this->input('id'),
            'nombre' => 'required',
            'apellido'=>'required',
            'cedula'=>'required|numeric|ecuador:ci|unique:users,cedula,'.$this->input('id'),
            'telefono'=>'nullable',
            'direccion'=>'nullable',
        ];
    }

    public function messages()
    {
        return [
            'cedula.ecuador:ci' => 'Cédula incorrecta'
        ];
    }
}
