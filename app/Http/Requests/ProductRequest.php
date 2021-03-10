<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name_product'=>'required|min:2',
            'des_product'=>'required',
            'count'=>'required|numeric',
            'discount'=>'required|numeric',
            'price'=>'required|numeric',
            'image_avatar'=>'image|max:1024|mimes:png,jpg|required',
            'image_list'=>'required',
            'image_list.*'=>'image|mimes:png,jpg,jpeg|max:1024',
            'brand_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name_product.required' => 'Vui lòng nhập thông tin',
            'name_product.min' => 'Tối thiểu là 2 ký tự',
            'des_product.required' => 'Vui lòng nhập thông tin',
            'count.required' => 'Vui lòng nhập thông tin',
            'count.numeric' => 'Vui lòng nhập số',
            'discount.required' => 'Vui lòng nhập thông tin',
            'discount.numeric' => 'Vui lòng nhập số',
            'price.required' => 'Vui lòng nhập thông tin',
            'price.numeric' => 'Vui lòng nhập số',
            'image_avatar.required' => 'Vui lòng chọn ảnh',
            'image_avatar.image' => 'File phải là ảnh',
            'image_avatar.max' => 'Kích thước ảnh không quá 1MB',
            'image_avatar.mimes' => 'Ảnh có định dạng: JPG, PNG',
            'image_list.required' => 'Vui lòng chọn ảnh',
            'image_list.*.image' => 'File phải là ảnh',
            'image_list.*.mimes' => 'Ảnh có định dạng là jpg, png',
            'image_list.*.max' => 'Kích thước ảnh không quá 1MB',
            'brand_id.required' => 'Vui lòng chọn loại sản phẩm',

        ];
    }
}
