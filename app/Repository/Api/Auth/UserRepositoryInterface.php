<?php

namespace App\Repository\Api\Auth;

use Illuminate\Http\Request;

interface UserRepositoryInterface{

    public function register($request);
    // public function login($request);
    public function show($request);
    public function update($request);

}
