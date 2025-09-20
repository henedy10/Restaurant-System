<?php

namespace App\Http\Requests\admin\item;

use Illuminate\Foundation\Http\FormRequest;

class updateItem extends FormRequest
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
            'name'         => 'required|string|unique:menu,name,' . $this->route('item'),
            'type'         => 'required|string',
            'description'  => 'required|string',
            'price'        => 'required|decimal:0,2',
            'image'        => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
        ];
    }
}
