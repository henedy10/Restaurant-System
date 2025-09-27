<?php

namespace App\Http\Requests\client;

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
            'firstName'          => 'required',
            'email_contact'      => 'required|email:rfc,dns|exists:subscribers,email',
            'subject'            => 'required',
            'message'            => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'email_contact.exists' => 'You must subscribe first',
        ];
    }
}
