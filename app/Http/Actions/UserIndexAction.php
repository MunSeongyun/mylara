<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Services\UserService;
use App\Http\Responders\UserResponder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class UserIndexAction extends Controller
{
    private UserService $userService;
    private UserResponder $userResponder;

    public function __construct(
        UserService $userService,
        UserResponder $userResponder
    ) {
        $this->userService = $userService;
        $this->userResponder = $userResponder;
    }

    public function __invoke(Request $request): Response
    {        
        $user = $this->userService->retrieveUser($request->query('id', '1'));
        return ($this->userResponder)($user);
    }
}