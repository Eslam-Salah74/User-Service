<?php

namespace App\Repository\Api\Auth;

use Illuminate\Http\Request;

interface UserRepositoryInterface{

    public function register(Request $request);
    public function login(Request $request);
}
