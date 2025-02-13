<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'paddle_product_id' => ['required'],
            'title' => ['required'],
            'tagline' => ['required'],
            'description' => ['required'],
            'image_name' => ['required'],
            'learnings' => ['required'],
            'released_at' => ['nullable', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
