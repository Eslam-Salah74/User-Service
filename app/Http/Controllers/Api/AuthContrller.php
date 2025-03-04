<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
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

    public function login(LoginRequest $request)
    {
        return $this->authRepository->login($request);
    }
}
