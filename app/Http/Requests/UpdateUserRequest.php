<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'email_verified_at' => ['nullable', 'date'],
            'password' => ['required'],
            'remember_token' => ['nullable'],
            'current_team_id' => ['nullable', 'integer'],
            'profile_photo_path' => ['nullable'],
            'two_factor_secret' => ['nullable'],
            'two_factor_recovery_codes' => ['nullable'],
            'two_factor_confirmed_at' => ['nullable', 'date'],
            'role' => 'required|exists:roles,name',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
