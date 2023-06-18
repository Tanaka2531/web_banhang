<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Member_Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name_member' => 'required',
            'address' => 'required',
            'phone' => 'required|min:10|max:11',
            'email' => 'required',
            'birthday' => 'required',
            'photo_member' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages() {

        return [
            'photo_member.mimes' => 'Ảnh phải là những định dạng jpeg, png, jpg, gif, svg',
            'photo_member.max' => 'Ảnh chỉ nhập ảnh có kích thước tối đa 2MB',
            'name_member.required' => 'Tên thành viên không được trống',
            'address.required' => 'Địa chỉ không được trống',
            'phone.required' => 'Số điện thoại nhập không được trống',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 số',
            'phone.max' => 'Số điện thoại không vượt quá 11 số',
            'email.required' => 'Email không được trống',
            'birthday.required' => 'Ngày sinh không được trống',
        ];
    }
}
