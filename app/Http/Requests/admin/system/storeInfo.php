<?php

namespace App\Http\Requests\admin\system;

use Illuminate\Foundation\Http\FormRequest;

class storeInfo extends FormRequest
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
        return
        [
            'email'   => 'required|email:rfc,dns',
            'phone'   => 'required|regex:/^\+?[0-9]{11,15}$/',
            'address' => 'required|string|min:5|max:255',
        ];
    }
}
