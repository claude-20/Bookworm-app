<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookApiController;
use App\Http\Controllers\RentApiController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/books', [BookApiController::class, 'index'])->name('books.index');
Route::get('/user-books', [RentApiController::class, 'getUserBooks'])->name('rents.user-books');
Route::post('/buy/{bookId}', [RentApiController::class, 'buy'])->name('rents.buy');
Route::post('/rent/{bookId}', [RentApiController::class, 'rent'])->name('rents.rent');
Route::delete('/rents/{bookId}', [RentApiController::class, 'destroy'])->name('rents.destroy');


