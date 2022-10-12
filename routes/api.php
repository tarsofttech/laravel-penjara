<?php

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

Route::middleware('auth.basic')->get('/user', function (Request $request) {
    return $request->user(); // auth()->user()
});

// http://127.0.0.1:8000/api/test 
// http://penjara-training.test/api/test
Route::get('/test', function(){
    return 'test';
});

// send in json
Route::get('/test-rest-api', function(){
    return response()->json([
        'message' => 'All services is okay!'
    ]);
});

Route::get('/transactions', [App\Http\Controllers\APIController::class, 'index']);
