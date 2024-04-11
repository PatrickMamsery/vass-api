<?php

use App\Http\Controllers\API\PassportAuthController;
use App\Http\Controllers\API\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Test Endpoint
Route::get('/test', function () {
    return response()->json(['message' => 'Welcome to VASS API!'], 200);
});

/* ============== Auth Routes ============== */
Route::post('/register', [PassportAuthController::class, 'register']);
Route::post('/login', [PassportAuthController::class, 'login']);

/* ============== User Routes ============== */
Route::get('/users', [UserController::class, 'index'])->middleware('withoutlinks');
Route::get('/users-by-role/{role}', [UserController::class, 'getUsersByRole'])->middleware('withoutlinks');

Route::post('/users', [UserController::class, 'store']);
