<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TurmaController;
use App\Models\Turma;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('entrar'),
//         'canRegister' => Route::has('registrar'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return Inertia::render('Auth/Login');
});

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Registro
// Route::get('registrar', [RegisteredUserController::class, 'create'])
// ->name('registrar');

// Route::post('registro', [RegisteredUserController::class, 'store']);

// Route::post('entrar', [LoginController::class, 'auth'])->name('entrar');

Route::middleware('auth')->group(function () {
    // Cadastro e tela
    Route::inertia('/cadastroAluno', 'aluno/CadastroAluno')->name('CadastroAluno');
    Route::inertia('/cadastroTurma', 'turma/CadastroTurma')->name('CadastroTurma');
    Route::post('/turmaCadastro', [TurmaController::class, 'store'])->name('turmaCadastro');
    Route::post('/alunoCadastro', [AlunoController::class, 'store'])->name('alunoCadastro');

    // Editar e tela
    Route::get('/editAluno/{id}', [AlunoController::class, 'show'])->name('editAluno');
    Route::get('/editTurma/{id}', [TurmaController::class, 'show'])->name('editTurma');

    Route::post('/updateTurma', [TurmaController::class, 'update'])->name('upTurma');
    Route::post('/updateAluno', [AlunoController::class, 'update'])->name('upAluno');
});



require __DIR__ . '/auth.php';
