<?php

use App\Http\Controllers\AppVersionController;
use App\Http\Controllers\CaverneController;
use App\Http\Controllers\ConteController;
use App\Http\Middleware\VerifyDeployToken;
use App\Http\Middleware\VerifyToken;
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

// AppVersion Controller
Route::get('/app-conf', [AppVersionController::class, 'AppConf'])->middleware(VerifyToken::class);
Route::post('/deploy-release/{newVersion}', [AppVersionController::class, 'DeployRelease'])->middleware(VerifyDeployToken::class);
// Conte Controller
Route::post('/conte/{id}/eval/{note}', [ConteController::class, 'eval'])->middleware(VerifyToken::class);
// Caverne Controller
Route::get('caverne', [CaverneController::class, 'caverne'])->middleware(VerifyToken::class);
// Conte Controller
Route::get('conte', [ConteController::class, 'conte'])->middleware(VerifyToken::class);
