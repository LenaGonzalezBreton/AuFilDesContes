<?php

use App\Http\Controllers\LivreOrController;
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
    $livres = LivreOr::where('is_verified_livreor',1)->get();
    return view('welcome',compact('livres'));
});

Route::post('/addLivreOr', [LivreOrController::class, 'store'])->name('addLivreOr');
