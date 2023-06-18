<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Product_Request extends FormRequest
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
            'photo_product' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name_product' => 'required',
            'cate_product' => 'required',
            'sup_product' => 'required',
        ];
    }

    public function messages() {
        return [
            'photo_product.mimes' => 'Ảnh phải là những định dạng jpeg, png, jpg, gif, svg',
            'photo_product.max' => 'Ảnh chỉ nhập ảnh có kích thước bé hơn 2MB',
            'name_product.required' => 'Tên sản phẩm không được trống',
            'cate_product.required' => 'Bạn chưa chọn loại sản phẩm',
            'sup_product.required' => 'Bạn chưa chọn hãng sản xuất',
        ];
    }
}
