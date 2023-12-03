<?php

use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\ProfileController;
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


Route::post('/guestbook', [GuestbookController::class, 'store']);
Route::get('/guestbook/create', [GuestbookController::class, 'create'])->name('guestbook.create');


Route::get('/guestbook', [GuestbookController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('guestbook.index');

Route::post('/guestbook/create', [GuestbookController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('guestbook.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
