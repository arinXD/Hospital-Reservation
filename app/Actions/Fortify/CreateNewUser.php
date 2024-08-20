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
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        // echo $input["username"];
        date_default_timezone_set('Asia/Bangkok');
        $age = floor((strtotime("now")-strtotime($input["birthday"])) / (60 * 60 * 24 * 365));

        Validator::make($input, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'birthday' => ['required', 'date', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            // 'profile_photo_path' => ['required', 'strinig', 'max:2048'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate()
        ;

        return User::create([

            'username' => $input['username'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'birthday' => $input['birthday'],
            // 'profile_photo_path' => $input['profile_photo_path'],
        ]);
    }
}
