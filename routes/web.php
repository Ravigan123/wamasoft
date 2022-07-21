<?php

use App\Http\Controllers\QualityController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\ServerTitleController;
use App\Models\ServerTitle;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [QualityController::class, 'index']);
Route::get('/data', [QualityController::class, 'data']);

Route::delete('/del/{id}', [QualityController::class, 'destroy']);
Route::delete('/{id}', [ServerTitleController::class, 'destroy']);