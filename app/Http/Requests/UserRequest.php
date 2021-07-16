<?php

namespace App\Http\Requests;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
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
            'name'     => 'required',
            'email'    => 'required|email:dns|unique:users,email,' . $this->user,
            'phone'    => 'required|numeric',
            'password' => ['required',
                'min:8',
                'regex:/([a-z]+)/',
                'regex:/([A-Z]+)/',
                'regex:/([0-9]+)/',

            ]
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
           
        ];
    }
}
