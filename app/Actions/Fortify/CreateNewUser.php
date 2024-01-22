<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_no' => ['required', 'numeric', 'digits_between:1,11'],
            'user_id' => ['required', 'numeric', 'digits:10', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ], [
            'user_id.required' => 'The Admission No. Field is required.',
            'user_id.numeric' => 'The Admission No. Field must be a number.',
            'user_id.digits' => 'The Admission No. must be 10 digits.',
            'user_id.unique' => 'The Admission No. already is taken'
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone_no' => $input['phone_no'],
            'user_id' => $input['user_id'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
