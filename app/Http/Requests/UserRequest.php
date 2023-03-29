<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [

          'employee_code' =>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.unique' => 'Name to be unique'
        ];
    }
    public function failedValidation(Validator $validator)

    {

        throw new HttpResponseException( Resp($validator->errors(),'',200));

    }
}
