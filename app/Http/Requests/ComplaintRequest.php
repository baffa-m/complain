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
            'session' => 'string|nullable',
            'description' => 'nullable|string',
            'course' => 'nullable|string',
        ];

        // If drop_title is present and it is not 'Others', set its value as the value of title
        if ($this->filled('drop_title') && $this->input('drop_title') !== 'Others') {
            // Reset the title validation rule to be required
            $rules['title'] = 'required|string|max:255';

            // Set the title value based on drop_title
            $this->merge(['title' => $this->input('drop_title')]);
        }

        return $rules;
    }
}
