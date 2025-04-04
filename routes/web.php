<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ShowPagesController;
use App\Http\Controllers\UpdateController;
use App\Http\Middleware\IsLoggedIn;
use App\Http\Middleware\IsNotLoggedIn;
use Illuminate\Support\Facades\Route;

// O USUÁRIO NÃO ESTÁ LOGADO, BLOQUEIA ACESSO A:
Route::middleware([IsNotLoggedIn::class])->group(function() {

    // SHOWPAGES ROUTES
    Route::get('/homepage', [ShowPagesController::class, 'homepagePage'])->name('homepage');
    Route::get('/cadastros', [ShowPagesController::class, 'cadastrosPage'])->name('cadastros');
    Route::get('/usuarios', [ShowPagesController::class, 'usuariosPage'])->name('usuarios');
    Route::get('/update-usuario/{id}', [ShowPagesController::class, 'updateUsuarioPage'])->name('update-usuario');
    Route::get('/update-senha/{id}', [ShowPagesController::class, 'updatePasswordPage'])->name('update-senha');
    Route::get('/sites', [ShowPagesController::class, 'sitesPage'])->name('sites');
    Route::get('/update-site/{id}', [ShowPagesController::class, 'updateSitePage'])->name('update-site');
    Route::get('/avarias', [ShowPagesController::class, 'avariasPage'])->name('avarias');
    Route::get('/update-avaria/{id}', [ShowPagesController::class, 'updateAvariaPage'])->name('update-avaria');
    Route::get('/turnos', [ShowPagesController::class, 'turnosPage'])->name('turnos');
    Route::get('/update-turno/{id}', [ShowPagesController::class, 'updateTurnoPage'])->name('update-turno');

    // EXECUÇÕES ROUTES
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/createUser', [CreateController::class, 'createUser'])->name('createUser');
    Route::post('/updateUser/{id}', [UpdateController::class, 'updateUser'])->name('updateUser');
    Route::post('/updatePassword/{id}', [PasswordController::class, 'updatePassword'])->name('updatePassword');
    Route::post('/createSite', [CreateController::class, 'createSite'])->name('createSite');
    Route::post('/updateSite/{id}', [UpdateController::class, 'updateSite'])->name('updateSite');
    Route::post('/createAvaria', [CreateController::class, 'createAvaria'])->name('createAvaria');
    Route::post('/updateAvaria/{id}', [UpdateController::class, 'updateAvaria'])->name('updateAvaria');
    Route::post('/createTurno', [CreateController::class, 'createTurno'])->name('createTurno');
    Route::post('/updateTurno/{id}', [UpdateController::class, 'updateTurno'])->name('update-turno');

});

// O USUÁRIO ESTÁ LOGADO, BLOQUEIA ACESSO A:
Route::middleware([IsLoggedIn::class])->group(function() {

    // SHOWPAGES ROUTES
    Route::get('/', [ShowPagesController::class, 'loginPage'])->name('login');

    // EXECUTIONS ROUTES
    Route::post('/submitLogin', [AuthController::class, 'submitLogin'])->name('submitLogin');

});
