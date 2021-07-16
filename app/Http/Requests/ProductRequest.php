<?php

namespace App\Http\Requests;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
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
            'name' => 'required|unique:products,name,' .$this->product,
            'slug' => 'required|unique:products,slug,' .$this->product,
            'price' => 'required|numeric',
            'category_ids' => 'required|array',

        ];
    }

     public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => [
                'status'   => false,
                'code'     => Response::HTTP_UNPROCESSABLE_ENTITY,
                'messages' => $validator->errors(),
            ]
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }

    public function messages()
    {
        return [
            'name.required'         => 'Tên sản phẩm không được bỏ trống',
            'slug.required'         => 'Slug không được bỏ trống',
            'price.required'        => 'Giá sản phẩm không được để trống',
            'price.numeric'         => 'Giá sản phẩm phải là số',
            'category_ids.requied'  => 'Danh mục sản phẩm không được để trống',
            'category_ids.array'    => 'Dữ liệu danh mục sản phẩm không đúng quy định',
        ];
    }
}
