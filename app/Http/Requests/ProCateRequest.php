<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProCateRequest extends FormRequest
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
        //cac truong tuong ung trong form tao
        return [
            'name_categ'=>'required|min:2',
            'des_categ'=>'required|min:5',
        ];
    }
    public function messages()
    {
        return [
            'name_categ.required' => 'Vui lòng nhập thông tin',
            'name_categ.min' => 'Tối thiểu là 2 ký tự',
            'des_categ.required' => 'Vui lòng nhập thông tin',
            'des_categ.min' => 'Tối thiểu là 5 ký tự',
        ];
    }
}
