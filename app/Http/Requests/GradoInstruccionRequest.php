<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\GradoInstruccion;

class GradoInstruccionRequest extends FormRequest
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
        $GradoInstruccion=GradoInstruccion::find($this->id);
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
                    'grado_instruccion'=>'min:3|max:30|required|unique:grados_instrucciones',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'grado_instruccion'=>'min:3|max:30|required|unique:grados_instrucciones,grado_instruccion,'.$GradoInstruccion->id,
                ];
            }
            default:break;
        }
    }
}
