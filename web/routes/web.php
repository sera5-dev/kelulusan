<?php

use App\Http\Controllers\PredictionController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ModelController;
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

Route::get('/', [PredictionController::class, 'index']);
Route::get('/prediction', [PredictionController::class, 'index'])->name('prediction');
Route::post('/prediction', [PredictionController::class, 'store'])->name('prediction-store');
Route::post('/prediction/valid', [PredictionController::class, 'valid'])->name('prediction-valid');

Route::get('/data', [DataController::class, 'index'])->name('data');
Route::get('/model', [ModelController::class, 'index'])->name('model');
Route::get('/team', function () {
  return view('team');
})->name('team');
