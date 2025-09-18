<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class storeChef extends FormRequest
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
            'name'  => 'required|string|unique:chefs,name',
            'role'  => 'required|string',
            'info'  => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
        ];
    }
}
