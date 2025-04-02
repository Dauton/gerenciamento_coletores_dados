<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\ShowPagesController;
use App\Http\Middleware\IsLoggedIn;
use App\Http\Middleware\IsNotLoggedIn;
use Illuminate\Support\Facades\Route;

// O USUÁRIO NÃO ESTÁ LOGADO, BLOQUEIA ACESSO A:
Route::middleware([IsNotLoggedIn::class])->group(function() {

    // SHOWPAGES ROUTES
    Route::get('/homepage', [ShowPagesController::class, 'homepagePage'])->name('homepage');
    Route::get('/cadastros', [ShowPagesController::class, 'cadastrosPage'])->name('cadastros');
    Route::get('/usuarios', [ShowPagesController::class, 'usuariosPage'])->name('usuarios');

    // EXECUÇÕES ROUTES
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/createUser', [CreateController::class, 'createUser'])->name('createUser');

});

// O USUÁRIO ESTÁ LOGADO, BLOQUEIA ACESSO A:
Route::middleware([IsLoggedIn::class])->group(function() {

    // SHOWPAGES ROUTES
    Route::get('/', [ShowPagesController::class, 'loginPage'])->name('login');

    // EXECUTIONS ROUTES
    Route::post('/submitLogin', [AuthController::class, 'submitLogin'])->name('submitLogin');

});
