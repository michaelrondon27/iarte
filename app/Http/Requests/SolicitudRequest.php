<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Solicitud;

class SolicitudRequest extends FormRequest
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
        $solicitud=Solicitud::find($this->id);
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'nombres'=>'min:4|max:50|required',
                    'apellidos'=>'min:4|max:50|required',
                    'cedula'=>'min:7|max:8|required|unique:solicitudes',
                    'fecha_nacimiento'=>'required',
                    'estado_civil_id'=>'required',
                    'correo'=>'required|email',
                    'estado_id'=>'required',
                    'estado_civil_id'=>'required',
                    'grado_instruccion_id'=>'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'nombres'=>'min:4|max:50|required',
                    'apellidos'=>'min:4|max:50|required',
                    'cedula'=>'min:7|max:8|required|unique:solicitudes,cedula,'.$solicitud->id,
                    'fecha_nacimiento'=>'required',
                    'estado_civil_id'=>'required',
                    'correo'=>'required|email',
                    'estado_id'=>'required',
                    'estado_civil_id'=>'required',
                    'grado_instruccion_id'=>'required',
                ];
            }
            default:break;
        }
    }
}
