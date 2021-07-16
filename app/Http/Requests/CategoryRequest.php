<?php

namespace App\Http\Requests;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name' => 'required|unique:categories,name,' . $this->category,
            'slug' => 'required|unique:categories,slug,' . $this->category,
            // validate ko đc là con của chính nó
            'parent_id' => [Rule::notIn([$request->route('category')])]

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
            'name.required' => 'Tên danh mục không được bỏ trống',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'slug.required' => 'slug danh mục không được bỏ trống',
            'slug.unique' => 'slug danh mục đã tồn tại',
        ];
    }
}
