<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;
use App\Http\Middleware\Authenticate;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//expenses - will need these for returning data
Route::get('/expenses', [ExpenseController::class, 'getExpenses'])->middleware("auth");
//remove comments when updated 
Route::group(['prefix' => '/expense', 'middleware' => ['auth']], function(){
    Route::post('/store', [ExpenseController::class, 'store'])->name('api.expense.store');
//     Route::put('/{id}', [ExpenseController::class, 'update']);
//     Route::delete('/{id}', [ExpenseController::class, 'destroy']);
});