<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Pais;

class PaisRequest extends FormRequest
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
        $pais=Pais::find($this->id);
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
                    'pais'=>'min:4|max:50|required|unique:paises',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'pais'=>'min:4|max:50|required|unique:paises,pais,'.$pais->id,
                ];
            }
            default:break;
        }
    }
}
