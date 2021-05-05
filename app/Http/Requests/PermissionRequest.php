<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'name'=>'required|max:90|min:10|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required'  =>'Name alanı gereklidir',
            'name.max'       =>'Name alanı en fazla 90 karakter olabilir',
            'name.min'       =>'Name alanı en az 10 karater olabilir',
            'name.string'    =>'Name alanı string olmalıdır',

        ];
    }
}
