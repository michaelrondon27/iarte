<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UserRequest extends FormRequest
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
        $user=User::find($this->user);
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
                    'name'=>'min:4|max:150|required',
                    'email'=>'required|unique:users',
                    'password'=>'min:8|max:12|required',
                    'password_confirmation' => 'required|min:8|max:12',
                    'perfil'=>'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'perfil'=>'required',
                ];
            }
            default:break;
        }
    }
}
