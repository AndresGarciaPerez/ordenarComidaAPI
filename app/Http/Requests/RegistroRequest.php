<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegistroRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required','email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(6)]
        ];
    }

    public function messages()
    {
        return [
            'name' => 'El nombre es obligatorio',
            'email.required' => 'El Email es obligatorio',
            'email.email' => 'Email no valido',
            'email.unique' => 'El Email ya esta registrado',
            'password' => 'La contraseña es obligatoria, minimo 6 caracteres',
        ];
    }
}
