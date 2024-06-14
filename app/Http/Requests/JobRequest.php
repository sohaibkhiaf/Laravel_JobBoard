<?php

namespace App\Http\Requests;

use App\Models\JobOffer;
use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|numeric|min:500',
            'location' => 'required|string|max:255',
            'experience' => 'required|in:' . implode(',' , JobOffer::$experience),
            'category' => 'required|in:'. implode(',' , JobOffer::$category),
        ];
    }
}
