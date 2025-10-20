<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'headline' => ['nullable', 'string', 'max:255'],
            // unique:{table_name},{column_name},{ignore_id}
            // Rule::unique('users, email')->ignore(auth()->user()->id)와 동일하다
            'email' => ['required', 'email', 'unique:users,email,' . auth()->user()->id],
            'gender' => ['nullable', 'in:male,female'],
            'about' => ['nullable', 'string', 'max:3000'],
        ];
    }
}
