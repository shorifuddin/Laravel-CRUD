<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
            'username' => 'required|unique:Staff|max:255',
            'email' => 'required|unique:Staff|max:255',
            'datebirth' => 'required|max:255',
            'gender' => 'required|max:255',
            'skill' => 'required|max:255',
            'category' => 'required|max:255',
            'about' => 'required|max:255',
            'image' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Fill The Name',
            'username.unique' => 'Username is not available',
        ];
    }

    public function attributes()
    {
        return[
          'email' => 'Email Address'
        ];
    }

}
