<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
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
Route::get('/event', [EventController::class, 'index' ])-> name('event.index');
Route::get('/event/create', [EventController::class, 'create' ])-> name('event.create');
Route::post('/event/', [EventController::class, 'store' ])-> name('event.store');
Route::get('/event/{event}/edit', [EventController::class, 'edit'])->name('event.edit');
Route::put('/event/{event}/update', [EventController::class, 'update'])->name('event.update');
Route::delete('/event/{event}/destroy', [EventController::class, 'destroy'])->name('event.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/event', [EventController::class, 'index' ])-> name('event.index');
Route::get('/event/create', [EventController::class, 'create' ])-> name('event.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
