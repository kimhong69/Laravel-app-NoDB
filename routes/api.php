<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and are all assigned to
| the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Example public API route
use App\Http\Controllers\StudentController;

Route::get('/students', [StudentController::class, 'index']);   // List all students
Route::post('/students', [StudentController::class, 'store']);  // Create new student

