<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeBookingTable extends FormRequest
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
            'name'    => 'required|string',
            'email'   => 'required|email:rfc,dns',
            'phone'   => 'required|digits:11',
            'people'  => 'required|min:1|max:6',
            'date'    => 'required|date',
            'time'    => 'required|date_format:H:i',
        ];
    }
}
