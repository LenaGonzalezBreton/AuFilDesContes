<?php

use App\Http\Controllers\CaverneController;
use App\Http\Controllers\ConteController;
use App\Http\Controllers\LivreOrController;
use App\Http\Controllers\MotCleController;
use App\Http\Controllers\PageController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'caverne' => CaverneController::class,
    'conte' => ConteController::class,
    'livreor' => LivreOrController::class,
    'motcle' => MotCleController::class,
    'page' => PageController::class,
]);
