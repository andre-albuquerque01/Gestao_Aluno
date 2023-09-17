<?php

use App\Http\Controllers\AlunoController;
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
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Cadastro e tela
Route::inertia('/cadastroAluno', 'aluno/CadastroAluno')->name('aluno.CadastroAluno');
Route::inertia('/cadastroTurma', 'turma/CadastroTurma')->name('turma.CadastroTurma');
Route::post('/turmaCadastro', [TurmaController::class, 'store'])->name('turmaCadastro');
Route::post('/alunoCadastro', [AlunoController::class, 'store'])->name('alunoCadastro');

// Editar e tela
Route::get('/editAluno/{id}', [AlunoController::class, 'show'])->name('editAluno');
Route::get('/editTurma/{id}', [TurmaController::class, 'show'])->name('editTurma');

Route::post('/updateTurma', [TurmaController::class, 'update'])->name('upTurma');
Route::post('/updateAluno', [AlunoController::class, 'update'])->name('upAluno');



require __DIR__ . '/auth.php';
