<?php

use App\Http\Controllers\api\TaskController;
use App\Http\Controllers\api\TasklistController;
use App\Http\Controllers\api\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::resource('tasklists', TasklistController::class);
Route::resource('tasks', TaskController::class);

// Routes d'authentification

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Routes protégées par Sanctum

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });
});



