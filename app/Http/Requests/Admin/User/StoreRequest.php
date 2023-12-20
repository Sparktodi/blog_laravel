<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'email' => 'required|string|email',
            'name' => 'required|string',
            'role' => 'required|integer'
        ];
    }

    public function messages(){
        return [
            'email.required' => 'This field is required',
            'email.string' => 'The data must match the string type',
            'email.email' => 'Your mail must match the format mail@some',
            'email.unique' => 'User with this email already exists',
            'name.required' => 'This field is required',
            'name.string' => 'The data must match the string type',
        ];

    }

}
