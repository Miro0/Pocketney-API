<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserService
{
    /**
     * @param $data
     * @return User
     */
    public function createUser($data): User
    {
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }

    /**
     * @param User|null $user
     * @param string|null $password
     * @throws ValidationException
     */
    public function validateUserPassword(?User $user = null, $password = null): void
    {
        if (!$user || !Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials'],
            ]);
        }
    }
}
