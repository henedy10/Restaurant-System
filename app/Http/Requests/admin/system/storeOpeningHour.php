<?php

namespace App\Http\Requests\admin\system;

use Illuminate\Foundation\Http\FormRequest;

class storeOpeningHour extends FormRequest
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
            'from_day'  => 'required|in:Friday,Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday',
            'to_day'    => 'in:Friday,Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday',
            'from_time' => 'required|date_format:h:i A',
            'to_time'   => 'required|date_format:h:i A|after:From_Time',
        ];
    }
}
