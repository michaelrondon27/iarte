<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Profesion;

class ProfesionRequest extends FormRequest
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
        $profesion=Profesion::find($this->id);
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
                    'profesion'=>'min:4|max:150|required|unique:profesiones',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'profesion'=>'min:4|max:150|required|unique:profesiones,profesion,'.$profesion->id,
                ];
            }
            default:break;
        }
    }
}
