<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeContactMessage extends FormRequest
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
            'firstName'  => 'required',
            'email'      => 'required|email|exists:subscribers,email',
            'subject'    => 'required',
            'message'    => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'email.exists' => 'You must subsribe first',
        ];
    }
}
