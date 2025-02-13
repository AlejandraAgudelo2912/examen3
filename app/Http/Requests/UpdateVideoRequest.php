<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVideoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'course_id' => ['required', 'exists:courses'],
            'vimeo_id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'duration_in_min' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
