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
use Illuminate\Http\Request;
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

// Route::get('/caverne/{idCaverne}/conte', [App\Http\Controllers\ConteController::class, 'index'])->name("conte.index");

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

Route::post('/caverne/conte', [\App\Http\Controllers\ConteController::class, "rechercheConteCaverne"])->name("rechercheConteCaverne");

Route::post('/store-id', function (Request $request) {
    $id = $request->input('id');
    session()->forget('id'); // Supprime la clé 'id' de la session
    // Stocke le nouvel ID dans la session
    session()->put('id', $id);
    return response()->json(['success' => true]);
});
