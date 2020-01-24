<?php

namespace gym\Http\Requests\Usuarios;

use Illuminate\Foundation\Http\FormRequest;

class RqIngresar extends FormRequest
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
        $rg_tipo_identificacion='';
        switch ($this->input('tipo_identificacion')) {
            case 'Cédula':
                $rg_tipo_identificacion='ecuador:ci|unique:users';
                break;
            case 'Ruc persona Natural':
                $rg_tipo_identificacion='ecuador:ruc|unique:users';
                break;
            case 'Ruc Sociedad Pública':
                $rg_tipo_identificacion='ecuador:ruc_spub|unique:users';
                break;
            case 'Ruc Sociedad Privada':
                $rg_tipo_identificacion='ecuador:ruc_spriv|unique:users';
                break;
            case 'Pasaporte':
                $rg_tipo_identificacion='unique:users';
                break;
            case 'Otros':
                $rg_tipo_identificacion='unique:users';
                break;
        }

        return [
            'email'=>'required|string|email|max:255|unique:users',
            'nombre' => 'required',
            'apellido'=>'required',
            'tipo_identificacion'=>'required|in:Cédula,Ruc persona Natural,Ruc Sociedad Pública,Ruc Sociedad Privada,Pasaporte,Otros',
            'identificacion'=>'required|string|'.$rg_tipo_identificacion,
            'telefono'=>'nullable',
            'direccion'=>'nullable',
        ];
    }

    public function messages()
    {
        return [
            'cedula.ecuador' => 'Cédula incorrecta'
        ];
    }


}
