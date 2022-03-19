<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdateUser extends FormRequest
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
        $rules = [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
        ];

        if($this->isMethod('post')){
            $rules['email'] = 'required|email';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'firstName.required' => 'Nama depan harus diisi.',
            'firstName.max' => 'Karakter nama depan terlalu banyak',
            'lastName.required' => 'Nama belakang harus diisi.',
            'lastName.max' => 'Karakter nama belakang terlalu banyak',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email salah, tambahkan @',
        ];
    }
}
