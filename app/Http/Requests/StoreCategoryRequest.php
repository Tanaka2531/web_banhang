<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'status' => 'required',
            'photo' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục là bắt buộc',
            'name.max' => 'Tối đa là 255 ký tự',
            'status.required' => 'Vui lòng chọn trạng thái',
            'photo.mimes' => 'Định dạng hình ảnh không đúng',
            'photo.max' => 'Dung lượng ảnh tối đa là 2MB',
        ];
    }
}
