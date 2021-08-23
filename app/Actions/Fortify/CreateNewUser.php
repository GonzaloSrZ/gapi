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
        Validator::make($input, [
            'dni'=> ['required', 'integer','unique:users'],
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'tipodeusuario' => ['required', 'string', 'max:255'],
            'legajo' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telefono'=> ['required', 'integer'],
            'usuario' => ['required', 'string', 'max:255','unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'dni' => $input['dni'],
            'nombre' => $input['nombre'],
            'apellido' => $input['apellido'],
            'tipo de usuario' => $input['tipodeusuario'],
            'legajo' => $input['legajo'],
            'email' => $input['email'],
            'telefono' => $input['telefono'],
            'usuario' => $input['usuario'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
