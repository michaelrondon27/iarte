<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\EstadoCivil;

class EstadoCivilRequest extends FormRequest
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
        $estadoCivil=EstadoCivil::find($this->id);
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
                    'estado_civil'=>'min:4|max:15|required|unique:estados_civiles',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'estado_civil'=>'min:4|max:15|required|unique:estados_civiles,estado_civil,'.$estadoCivil->id,
                ];
            }
            default:break;
        }
    }
}
