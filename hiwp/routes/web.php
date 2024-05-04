<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('redeploy', [App\Http\Controllers\redeployController::class, 'index']);

Route::put('edit/{staffId}', [editController::class, 'edit']);

Route::delete('/delete/{staffId}', [deleteController::class, 'delete']);

Route::post('/sendmail/{staffId}', [MailController::class, 'sendEmail']);

Route::get('/sendmail', [mailController::class, 'sendEmail']);
// Route::get('/send-mail', [mailController::class, 'sendMailWithPdf']);