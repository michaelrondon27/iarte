<?php

namespace App\Http\Requests;
use App\Cargo;

use Illuminate\Foundation\Http\FormRequest;

class CargoRequest extends FormRequest
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
        $cargo=Cargo::find($this->id);
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
                    'cargo'=>'min:4|max:50|required|unique:cargos',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'cargo'=>'min:4|max:50|required|unique:cargos,cargo,'.$cargo->id,
                ];
            }
            default:break;
        }
    }
}
