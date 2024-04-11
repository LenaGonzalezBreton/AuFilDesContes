<?php

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
