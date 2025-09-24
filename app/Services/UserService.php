<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Models\User;

final class UserService
{

    public function retrieveUser(string $id): ?User
    {
        // Eloquent 모델을 사용하여 사용자를 찾습니다.
        return User::find($id);
    }
}