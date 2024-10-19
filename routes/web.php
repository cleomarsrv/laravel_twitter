<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/publicacoes', function () {
    return view('tweets.publicacoes');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('tweets', TweetController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::post('/comentarios',[ComentarioController::class,'store'])->name('comentarios.store');

Route::controller(LoginController::class)->group(function () {

    Route::get('/', 'index')->name('login.index');
    Route::post('/', 'store')->name('login.store');
    Route::get('/logout', 'destroy')->name('login.destroy');
  });

Route::post('cadastrar', [CadastroController::class, 'cadastrar'])->name('cadastrar');

Route::post('/users/{user}/follow',[FollowerController::class,'follow'])->middleware('auth')->name('users.follow');
Route::post('/users/{user}/unfollow',[FollowerController::class,'unfollow'])->middleware('auth')->name('users.unfollow');

Route::get('/user/{id}', [FollowerController::class, 'getUser']);

require __DIR__.'/auth.php';
