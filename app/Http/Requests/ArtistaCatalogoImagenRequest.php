<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistaCatalogoImagenRequest extends FormRequest
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
                    'nombre'=>'max:190|required',
                    'imagen'=>'image|required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'nombre'=>'max:190|required',
                ];
            }
            default:break;
        }
    }
}
