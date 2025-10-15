<?php

namespace App\Http\Requests\admin\system;

use Illuminate\Foundation\Http\FormRequest;

class storeImage extends FormRequest
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
            'section'  => 'string',
            'path'     => 'required|image|mimes:png,jpg,webp|max:1024',
        ];
    }
}
