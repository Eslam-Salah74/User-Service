<?php

use App\Http\Controllers\Api\AuthContrller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::GET('test',[AuthContrller::class,'test']);

Route::POST('/register', [AuthContrller::class, 'register']);
Route::POST('/login', [AuthContrller::class, 'login']);

Route::GET('users/{id}',[AuthContrller::class,'show']);
Route::PUT('users/{id}',[AuthContrller::class,'update']);
