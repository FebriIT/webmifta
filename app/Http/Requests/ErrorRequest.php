<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ];
        
    }
    public function messages()
    {
        
        return [
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'password.min' =>'Kata sandi minimal harus 6 karakter.',
            'password.required' =>'Kata sandi minimal harus 6 karakter.',
            'password_confirmation.required_with' =>'Password konfirmasi tidak sama.',
            'password_confirmation.min' =>'Kata sandi minimal harus 6 karakter.',
        ]; 
    }
}
