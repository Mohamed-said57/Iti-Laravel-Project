<?php

use App\Http\Controllers\Api\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/movies', [MovieController::class, 'index'])->name('api.movies.index');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('api.movies.show');