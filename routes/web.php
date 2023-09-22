<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RelController;
use App\Http\Controllers\TurmaController;
use App\Models\Rel;
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
    // Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
    Route::get('/dashboard', [RelController::class, 'index'])->name('dashboard');
    // Cadastro e tela
    // Editar e tela 
    // Aluno
    Route::inertia('/cadastroAluno', 'aluno/CadastroAluno')->name('CadastroAluno');
    Route::post('/alunoCadastro', [AlunoController::class, 'store'])->name('alunoCadastro');
    Route::get('/editAluno/{id}', [AlunoController::class, 'show'])->name('editAluno');
    Route::post('/updateAluno', [AlunoController::class, 'update'])->name('upAluno');
    Route::get('/removeAluno/{id}', [AlunoController::class, 'destroy'])->name('removeAluno');
    
    // Cadastro e tela
    // Editar e tela 
    // Turma
    Route::inertia('/cadastroTurma', 'turma/CadastroTurma')->name('CadastroTurma');
    Route::post('/turmaCadastro', [TurmaController::class, 'store'])->name('turmaCadastro');
    Route::get('/editTurma/{id}', [TurmaController::class, 'show'])->name('editTurma');
    Route::post('/updateTurma', [TurmaController::class, 'update'])->name('upTurma');
    Route::get('/removeTurma/{id}', [TurmaController::class, 'destroy'])->name('removeTurma');

    // Cadastro sala
    Route::get('/cadastroSala', [RelController::class, 'show'])->name('CadastroSala');
    Route::post('/cadSala', [RelController::class, 'store'])->name('cadSala');
    Route::get('/editSala/{id}', [RelController::class, 'edit'])->name('editSala');
    Route::post('/updateSala', [RelController::class, 'update'])->name('upSala');
    Route::get('/deleteSala/{id}', [RelController::class, 'destroy'])->name('deleteSala');

    Route::get('EditRegistro', [RegisteredUserController::class, 'show'])
        ->name('EditRegistro');
    Route::post('upRegistro', [RegisteredUserController::class, 'update'])
        ->name('upRegistro');
});



require __DIR__ . '/auth.php';
