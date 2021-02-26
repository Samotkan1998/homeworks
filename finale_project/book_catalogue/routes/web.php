<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [\App\Http\Controllers\BooksController::class, 'index'])->name('books.list');
Route::get('/book/{book}', [\App\Http\Controllers\BooksController::class, 'show'])->name('books.show');
Route::get('/books/create', [\App\Http\Controllers\BooksController::class, 'create'])->middleware(['auth'])->name('books.create');
Route::post('/', [\App\Http\Controllers\BooksController::class ,'store'])->name('books.store');
