<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;


Route::get('/', [AuthController::class, 'index'])->name('index');
Route::post('/', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/cadastro', [AuthController::class, 'cadastroAluno'])->name('cadastro.usuario');
Route::post('/cadastro', [AuthController::class, 'store'])->name('cadastro.usuario.store');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/cursos', [DashboardController::class, 'curso'])->name('cursos');
    Route::post('/cursos', [DashboardController::class, 'cadastrarCursos'])->name('cadastrar.cursos');

    Route::get('/curso{cursoId}', [DashboardController::class, 'edit'])->name('editar.curso');
    Route::put('/curso{cursoId}', [DashboardController::class, 'update'])->name('atualizar.curso');
    Route::get('/alunos', [UserController::class, 'index'])->name('alunos');

});

