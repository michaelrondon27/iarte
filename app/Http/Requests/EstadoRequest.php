<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Estado;

class EstadoRequest extends FormRequest
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
        $estado=Estado::find($this->id);
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
                    'estado'=>'min:4|max:50|required|unique:estados',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'estado'=>'min:4|max:50|required|unique:estados,estado,'.$estado->id,
                ];
            }
            default:break;
        }
    }
}
