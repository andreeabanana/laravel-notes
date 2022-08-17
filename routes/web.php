<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/notes/index', [App\Http\Controllers\NotesController::class, 'index'])->name('notes.index');
Route::get('/notes/delete/{id}', [App\Http\Controllers\NotesController::class, 'delete'])->name('notes.delete');
Route::get('/notes/add', [App\Http\Controllers\NotesController::class, 'add'])->name('notes.add');
Route::post('/notes/save', [App\Http\Controllers\NotesController::class, 'save'])->name('notes.save');
