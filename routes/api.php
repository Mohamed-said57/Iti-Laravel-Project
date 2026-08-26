<?php

use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\WatchlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/movies', [MovieController::class, 'index'])->name('api.movies.index');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('api.movies.show');

Route::get('/watchlists', [WatchlistController::class, 'index'])->name('api.watchlists.index');
Route::post('/watchlists', [WatchlistController::class, 'store'])->name('api.watchlists.store');
