<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\TrashedNoteController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/notes', NoteController::class)->middleware(['auth']);
Route::resource('/categories', CategoryController::class)->middleware(['auth']);


Route::prefix('/trashed')->name('trashed.')->middleware(['auth'])->group(function() {
    Route::get('/', [TrashedNoteController::class, 'index'])->name('index');
    Route::get('/{note}', [TrashedNoteController::class, 'show'])->withTrashed()->name('show');
    Route::put('/{note}', [TrashedNoteController::class, 'update'])->withTrashed()->name('update');
    Route::delete('/{note}', [TrashedNoteController::class, 'destory'])->withTrashed()->name('destroy');
});


Route::prefix('/public')->name('public.')->middleware(['auth'])->group(function() {
    Route::get('/', [PublicController::class, 'index'])->name('index');
    Route::get('/{note}', [PublicController::class, 'show'])->name('show');
    Route::put('/{note}', [PublicController::class, 'update'])->name('update');
   
});


  
require __DIR__.'/auth.php';
