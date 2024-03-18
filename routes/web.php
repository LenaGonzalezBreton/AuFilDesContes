<?php

use App\Http\Controllers\AppVersionController;
use App\Http\Controllers\CaverneController;
use App\Http\Controllers\ConteController;
use App\Http\Controllers\LivreOrController;
use App\Http\Controllers\MotCleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TokenController;
use App\Http\Middleware\VerifyDeployToken;
use App\Http\Middleware\VerifyToken;
use App\Models\AppVersion;
use App\Models\LivreOr;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resources([
    'caverne' => CaverneController::class,
    'conte' => ConteController::class,
    'livreor' => LivreOrController::class,
    'motcle' => MotCleController::class,
    'page' => PageController::class,
]);

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/mots-clefs', function () {
    return view('mot_clef/voir_mots_clefs');
})->name('mots-clefs');

Route::get('/ajouter-mot-clef', function () {
    return view('mot_clef/ajouter_modifier_mot_clef');
})->name('ajouter-mot-clef');

Route::get('/contes', function () {
    return view('conte/voir_contes');
})->name('contes');

Route::get('/cavernes', function () {
    return view('caverne/voir_cavernes');
})->name('cavernes');
