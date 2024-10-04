<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;

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

// 一般的に、/api/{※バージョン}/{リソース}/{※動詞}の構成でURLを作る
// {※}は必要であれば付ける
Route::get('/sample', [SampleController::class, 'index']);
Route::post('/sample/create', [SampleController::class, 'create']);
