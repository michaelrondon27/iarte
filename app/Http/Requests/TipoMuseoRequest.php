<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\TipoMuseo;

class TipoMuseoRequest extends FormRequest
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
        $tipoMuseo=TipoMuseo::find($this->id);
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
                    'tipo_museo'=>'min:4|max:50|required|unique:tipos_museos',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'tipo_museo'=>'min:4|max:50|required|unique:tipos_museos,tipo_museo,'.$tipoMuseo->id,
                ];
            }
            default:break;
        }
    }
}
