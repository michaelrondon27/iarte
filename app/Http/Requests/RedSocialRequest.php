<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RedSocialRequest extends FormRequest
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
        return [
            'red_social'=>'min:2|max:40|required|unique:redes_sociales',
            'icon_id'=>'required|unique:redes_sociales'
        ];
    }
}
