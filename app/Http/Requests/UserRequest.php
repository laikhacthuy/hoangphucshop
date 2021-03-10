<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'createusername' =>'required|min:4',
            'createpassword' =>'required|min:6',
            'retype_pass' => 'required|same:createpassword',
            'name' =>'required|min:5',
            'email' => 'required|email:rfc,dns',
            'role' => 'required',
            'phone' =>'required|numeric|digits_between:10,10',
        ];
    }
    public function messages()
    {
        return [
            'createusername.required' =>'Vui lòng nhập thông tin',
            'createusername.min' =>'Tối thiểu là 4 ký tự',
            'createpassword.required' =>'Vui lòng nhập thông tin',
            'createpassword.min' =>'Tối thiểu là 6 ký tự',
            'retype_pass.required' =>'Vui lòng nhập thông tin',
            'retype_pass.same' =>'Vui lòng nhập đúng với mật khẩu ở trên',
            'name.required' =>'Vui lòng nhập thông tin',
            'name.min' =>'Tối thiểu là 5 ký tự',
            'email.required' =>'Vui lòng nhập thông tin',
            'email.email' =>'Vui lòng nhập đúng định dạng email',
            'role.required' =>'Vui lòng chọn',
            'phone.required' =>'Vui lòng nhập thông tin',
            'phone.numeric' =>'Vui lòng nhập số',
            'phone.digits_between' =>'Điện thoại phải có 10 số',
        ];
    }
}
