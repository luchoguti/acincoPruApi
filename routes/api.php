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

Route::apiResource ('account','AccountController');
Route::apiResource ('account_seat','AccountingSeatController')->except ('destroy');
Route::apiResource ('balance','BalanceController')->except ('destroy');
Route::apiResource ('transaction','TransactionController')->except ('destroy');
Route::apiResource ('accountToAccount','AccountToAccountController')->except (['destroy','update']);

Route::get('/atm','AtmController@index');
Route::get('/atmRandom','AtmController@atmRandom');
Route::get('/bank','BankController@index');
Route::get('/type_account','TypeAccountController@index');
Route::get('/type_document','TypeDocumentController@index');
Route::get('/type_transaction','TypeTransactionController@index');
Route::get ('/accountRandom','AccountController@accountRandom');
Route::get ('/transactionForAccountOrigin/{AccountOrigin}','TransactionController@transactionAccountOrigin');

Route::get ('/balanceForAccount/{balanceForAccount}','BalanceController@balanceForAccount');
Route::post ('/verificationPasswordAccount','AccountController@verificationPasswordAccount');


