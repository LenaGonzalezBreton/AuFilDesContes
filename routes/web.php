<?php


use App\Http\Controllers\AppVersionController;
use App\Http\Controllers\CaverneController;
use App\Http\Controllers\ConteController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LivreOrController;
use App\Http\Controllers\MotCleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TokenController;
use App\Http\Middleware\VerifyDeployToken;
use App\Http\Middleware\VerifyToken;
use App\Models\AppVersion;
use App\Models\LivreOr;
use Illuminate\Http\Request;

use App\Http\Controllers\LivreOrController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [\App\Http\Controllers\Controller::class, "dashboard"])->name('dashboard');

Route::get('/mots-clefs', function () {
    return view('mot_clef/voir_mots_clefs');
})->name('mots-clefs');

Route::get('/ajouter-mot-clef', function () {
    return view('mot_clef/ajouter_modifier_mot_clef');
})->name('ajouter-mot-clef');

Route::post('/caverne/conte', [\App\Http\Controllers\ConteController::class, "rechercheConteCaverne"])->name("rechercheConteCaverne");

Route::get('/caverne/{idCaverne}/conte', [\App\Http\Controllers\ConteController::class, "indexConteCaverne"])->name("indexConteCaverne");

Route::post('/store-id', function (Request $request) {
    $id = $request->input('id');
    session()->forget('id'); // Supprime la clé 'id' de la session
    // Stocke le nouvel ID dans la session
    session()->put('id', $id);
    return response()->json(['success' => true]);

Route::get('/', function () {
    $livres = LivreOr::where('is_verified_livreor',1)
        ->orderBy('created_at', 'desc')
        ->get();
    return view('welcome',compact('livres'))->with('status', 'Message envoyé et en attente de validation par Au fil des contes');
})->name('home');

Route::post('/addLivreOr', [LivreOrController::class, 'store'])->name('addLivreOr');

Route::get('/contact', function (){
    return view('contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
