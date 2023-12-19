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
        return [
            'complainant' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'resolved_by' => 'nullable|string|max:255', // Adjust the rules as needed
            'user_id' => [
                'required',
                'exists:users,id', // Check if the user_id exists in the users table
                Rule::in([Auth::id()]) // Ensure user_id matches the authenticated user's ID
            ]
        ];
    }
}
