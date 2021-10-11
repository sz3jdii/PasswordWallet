<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        $passwordRule = 'nullable|min:8|same:password_confirmation';
        if($this->method() == 'POST'){
            $passwordRule = 'required|min:8|same:password_confirmation';
        }
        return [
            'name' => 'required|max:191',
            'email' => 'required|email|unique:users,email,'.$this->get('id'),
            'encryption_type' => 'required|string',
            'password' => $passwordRule
        ];
    }
}
