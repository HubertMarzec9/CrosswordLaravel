<?php

use App\Http\Controllers\DataController as DataControllerAlias;
use App\Http\Controllers\ScoreController as ScoreControllerAlias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('/score-save', [ScoreControllerAlias::class, 'save']);
Route::get('/crossword-data', [DataControllerAlias::class, 'dataAll']);
Route::get('/crossword-data-holiday', [DataControllerAlias::class, 'dataHoliday']);
Route::get('/crossword-data-answer-question', [DataControllerAlias::class, 'dataAnswerQuestion']);
