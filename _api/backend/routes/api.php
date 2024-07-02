<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\SampleController as SampleV1Controller;

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


// /api/v1/

// 一般的に、`/api/{※バージョン}/{リソース}/{※動詞}`の構成でURLを作る
// {※}は必要であれば付ける

// GET, POSTメソッドだけでRESTfulAPIを作る時
Route::prefix('v1/samples')->name('samples.')->group(function () {
    Route::get('/', [SampleV1Controller::class, 'index']);
    // Route::get('/{id}', [SampleV1Controller::class, 'detail']);
    // Route::post('/create', [SampleV1Controller::class, 'create']);
    // Route::post('/{id}/detail', [SampleV1Controller::class, 'update']);
    // Route::post('/{id}/delete', [SampleV1Controller::class, 'delete']);
});

// GET, POST,
Route::prefix('v2/samples')->name('samples.')->group(function () {
    Route::get('/', [SampleV1Controller::class, 'index']);
    // Route::get('/{id}', [SampleV1Controller::class, 'detail']);
    // Route::post('/create', [SampleV1Controller::class, 'create']);
    // Route::post('/{id}/detail', [SampleV1Controller::class, 'update']);
    // Route::post('/{id}/delete', [SampleV1Controller::class, 'delete']);
});

