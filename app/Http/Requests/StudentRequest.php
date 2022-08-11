<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'subj' => 'required|max:255',
            'email' => 'required|unique:Students|max:255',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Please Fill The Name',
            'email.unique' => 'email is not available',
        ];
    }

    public function attributes()
    {
        return[
          'email' => 'Email Address'
        ];
    }
}
