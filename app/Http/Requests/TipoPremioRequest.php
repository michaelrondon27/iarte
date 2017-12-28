<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\TipoPremio;

class TipoPremioRequest extends FormRequest
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
        $tipoPremio=TipoPremio::find($this->id);
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
                    'tipo_premio'=>'min:4|max:50|required|unique:tipos_premios',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'tipo_premio'=>'min:4|max:50|required|unique:tipos_premios,tipo_premio,'.$tipoPremio->id,
                ];
            }
            default:break;
        }
    }
}
