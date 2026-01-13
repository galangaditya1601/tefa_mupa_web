<?php

namespace App\Repositories;

use App\Schemas\auth\LoginSchema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class LoginRepository
{

    public function login(LoginSchema $schema): User
    {
        try {
            $schema->validate();
            $schema->hydrate();
            $user = User::where('email', $schema->getEmail())->first();
            if (!$user || !Hash::check(
                $schema->getPassword(),
                $user->password
            )) {
                throw ValidationException::withMessages([
                    'auth' => ['Email or password incorrect']
                ]);
            }
            return $user;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
