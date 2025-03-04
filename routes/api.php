<?php

use App\Http\Controllers\Api\AuthContrller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('test',[AuthContrller::class,'test']);

Route::post('/register', [AuthContrller::class, 'register']);
Route::post('/login', [AuthContrller
::class, 'login']);
