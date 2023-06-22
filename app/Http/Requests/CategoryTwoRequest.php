<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryTwoRequest extends FormRequest
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
            'cate_product_one' => 'required',
            'name_cate_two' => 'required',
            'photo_cate_two' =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          
        ];
    }

    public function messages() {
        return [
            'cate_product_one.required' => 'Tên màu không được trống',
            'name_cate_two.required' => 'Mã màu không được trống',
            'photo_cate_two.mimes' => 'Ảnh phải là những định dạng jpeg, png, jpg, gif, svg',
            'photo_cate_two.max' => 'Ảnh chỉ nhập ảnh có kích thước bé hơn 2MB',
        ];
    }
}
