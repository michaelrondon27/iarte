<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Etiqueta;

class EtiquetaRequest extends FormRequest
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
        $etiqueta=Etiqueta::find($this->id);
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
                    'etiqueta'=>'min:4|max:50|required|unique:etiquetas',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'etiqueta'=>'min:4|max:50|required|unique:etiquetas,etiqueta,'.$etiqueta->id,
                ];
            }
            default:break;
        }
    }
}
