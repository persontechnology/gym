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
        $rg_tipo_identificacion='';
        switch ($this->input('tipo_identificacion')) {
            case 'Cédula':
                $rg_tipo_identificacion='ecuador:ci|unique:users,identificacion,'.$this->input('id');
                break;
            case 'Ruc persona Natural':
                $rg_tipo_identificacion='ecuador:ruc|unique:users,identificacion,'.$this->input('id');
                break;
            case 'Ruc Sociedad Pública':
                $rg_tipo_identificacion='ecuador:ruc_spub|unique:users,identificacion,'.$this->input('id');
                break;
            case 'Ruc Sociedad Privada':
                $rg_tipo_identificacion='ecuador:ruc_spriv|unique:users,identificacion,'.$this->input('id');
                break;
            case 'Pasaporte':
                $rg_tipo_identificacion='unique:users,identificacion,'.$this->input('id');
                break;
            case 'Otros':
                $rg_tipo_identificacion='unique:users,identificacion,'.$this->input('id');
                break;
        }

        return [
            'id'=>'required',
            'email'=>'required|string|email|max:255|unique:users,email,'.$this->input('id'),
            'nombre' => 'required',
            'apellido'=>'required',
            'tipo_identificacion'=>'required|in:Cédula,Ruc persona Natural,Ruc Sociedad Pública,Ruc Sociedad Privada,Pasaporte,Otros',
            'identificacion'=>'required|string|'.$rg_tipo_identificacion,
            'telefono'=>'nullable',
            'direccion'=>'nullable',
            'estado'=>'nullable|in:1,0'
        ];
    }

    public function messages()
    {
        return [
            'cedula.ecuador:ci' => 'Cédula incorrecta'
        ];
    }
}
