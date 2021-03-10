<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProBrandRequest extends FormRequest
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
            'name_brand'=>'required|min:2',
            'des_brand'=>'required|min:5',
            'category_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name_brand.required' => 'Vui lòng nhập thông tin',
            'name_brand.min' => 'Tối thiểu là 2 ký tự',
            'des_brand.required' => 'Vui lòng nhập thông tin',
            'des_brand.min' => 'Tối thiểu là 5 ký tự',
            'category_id.required'=>'Vui lòng chọn loại sản phẩm'
        ];
    }
}
