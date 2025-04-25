<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\StudenteController;
use App\Models\Studente;
//Route::get('/', [StudenteController::class, 'index']); // homepage
Route::resource('studenti', StudenteController::class);

Route::get('/studenti/create',[StudenteController::class,'create'])->name('studenti.create');;
Route::get('/studenti/{id}/edit',[StudenteController::class,'edit']);
Route::post('/studenti', [StudenteController::class, 'store'])->name('studenti.store');
Route::put('/studenti/{id}', [StudenteController::class, 'update'])->name('studenti.update');

Route::get('/', function () {
    $studenti = Studente::orderBy('ID','asc')->paginate(10);
    return view('app', compact('studenti'));
    //return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
