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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/new-account', 'App\Http\Controllers\BankAccountController@newAccount');
Route::put('/update-account', 'App\Http\Controllers\BankAccountController@updateAccount');
Route::get('/get-accounts', 'App\Http\Controllers\BankAccountController@getAccounts');
Route::get('/get-edit-account/{id}', 'App\Http\Controllers\BankAccountController@getEditAccount');
Route::get('/get-organizations', 'App\Http\Controllers\BankAccountController@getOrganizations');
Route::delete('/delete-account/{Id}', 'App\Http\Controllers\BankAccountController@deleteAccount');
