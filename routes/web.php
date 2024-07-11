<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Chat02Controller;
use App\Http\Controllers\GeminiController;
use App\Http\Controllers\PythonController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/chat', [ChatController::class, 'chat'])->name('chat.create');
Route::post('/chat', [ChatController::class, 'chat'])->name('chat.post');


Route::get('/', function () {
  return view('welcom');
});
Route::get('/', [GeminiController::class, 'index'])->name('index');
Route::post('/', [GeminiController::class, 'entry'])->name('entry');

Route::get('/', function () {
  return view('');
});

Route::get('/run-python', [App\Http\Controllers\PythonController::class, 'runPython']);

Route::get('/chat02', [Chat02Controller::class, 'index']);
Route::post('/chat02', [Chat02Controller::class, 'chat']);