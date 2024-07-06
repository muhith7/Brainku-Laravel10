<?php

use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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
Route::get('/', [HomeController::class, 'index']);
 
Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/dash', function () {
//     return view('pages.index');
// })->name('mainindex');

// Route::controller(AlternativeController::class)->prefix('alternatives')->group(function () {
//     Route::get('', 'index')->name('alternative');
//     Route::get('create', 'create')->name('alternative.create');
//     Route::post('store', 'store')->name('alternative.store');
// });

Route::get('/alternative', [AlternativeController::class, 'index'])->name('alternative');
Route::get('/create', [AlternativeController::class, 'create'])->name('alternative.create');

Route::post('/alternative', [AlternativeController::class, 'store'])->name('alternative.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
