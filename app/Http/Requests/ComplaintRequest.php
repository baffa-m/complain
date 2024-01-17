<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ComplaintRequest extends FormRequest
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
        $rules = [
            'drop_title' => 'sometimes|required|string|max:255',
            'title' => 'required_without:drop_title|string|max:255',
            'description' => 'nullable|string',
            'course' => 'string',
        ];

        // If drop_title is present, set its value as the value of title
        if (request()->has('drop_title')) {
            $rules['title'] = 'required|string|max:255'; // Make title required
            request()->merge(['title' => request()->input('drop_title')]); // Set title value
        }

        return $rules;
    }
}
