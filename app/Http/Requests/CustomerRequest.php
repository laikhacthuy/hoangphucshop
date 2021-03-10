<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/*namespace using response form-request */
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class CustomerRequest extends FormRequest
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
            'create_username' =>'required|min:4',
            'create_password' =>['required','regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/'],
            'create_name' =>'required|min:5',
            'create_email' => 'required|email:rfc,dns',
            'create_phone' =>['required','regex:/0[3|5|7|8|9]+[0-9]{8}+$/'],
        ];
    }
    public function messages()
    {
        return [
            'create_username.required' =>'Vui lòng nhập tài khoản',
            'create_username.min' =>'Tối thiểu là 4 ký tự',

            'create_password.required' =>'Vui lòng nhập mật khẩu',
            'create_password.regex' =>'Mật khẩu ít nhất có 8 ký tự, trong đó có ít nhất 1 ký tự số và 1 ký tự viết hoa',

            'create_name.required' =>'Vui lòng nhập tên người dùng',
            'create_name.min' =>'Tối thiểu là 5 ký tự',

            'create_email.required' =>'Vui lòng nhập email',
            'create_email.email' =>'Vui lòng nhập đúng định dạng email',

            'create_phone.required' =>'Vui lòng nhập số điện thoại',
            'create_phone.regex' =>'Vui lòng nhập đúng định dạng số điện thoại',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['error'=>$validator->errors()], 422));
    }


}
