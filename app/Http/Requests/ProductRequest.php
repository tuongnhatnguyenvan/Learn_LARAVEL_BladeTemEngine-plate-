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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_name' => 'required|min:5|max:100',
            'product_price' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'product_name.required' => ' Truong :attribute Ban chua nhap ten san pham',
            'product_name.min' => 'Truong :attribute phai co do dai tu 5 den 100 ki tu',
            'product_price.required' => 'Ban chua nhap :attribute',
            'product_price.integer' => ':attribute phai la so nguyen',
        ];
    }

    public function attributes(){
        return [
            'product_name' => 'Ten san pham',
            'product_price' => 'Gia san pham',
        ];
    }
}
