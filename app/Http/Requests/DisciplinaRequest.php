<?php

namespace App\Http\Requests;
use App\Disciplina;

use Illuminate\Foundation\Http\FormRequest;

class DisciplinaRequest extends FormRequest
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
        $disciplina=Disciplina::find($this->id);
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
                    'disciplina'=>'min:4|max:50|required|unique:disciplinas',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'disciplina'=>'min:4|max:50|required|unique:disciplinas,disciplina,'.$disciplina->id,
                ];
            }
            default:break;
        }
    }
}
