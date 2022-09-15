<?php

use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', [UserController::class, "user"]);

Route::post("/login", [AuthUserController::class, "login"]);
Route::post("/logout", [AuthUserController::class, "logout"]);
Route::post("/register", [AuthUserController::class, "register"]);