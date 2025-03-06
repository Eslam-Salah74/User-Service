<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repository\Api\Auth\UserRepositoryInterface;

class AuthContrller extends Controller
{
    protected $authRepository;

    public function __construct(UserRepositoryInterface $authRepository) {
        $this->authRepository = $authRepository;
    }

    public function register(RegisterRequest $request)
    {

        return $this->authRepository->register($request);
    }

    // public function login(LoginRequest $request)
    // {
    //     return $this->authRepository->login($request);
    // }

    // Return One User
    public function show(Request $request)
    {
        return $this->authRepository->show($request);
    }

    public function update(UpdateUserRequest $request)
    {
        return $this->authRepository->update($request);
    }
}
