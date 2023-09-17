<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codTurma' => 'required|string|max:100',
            'dataInicio' => 'required|date',
            'dataFim' => 'required|date',
            'qtdAlunos' => 'required',
        ]);

        try {
            // Inserir na tabela 'turma'
            Turma::create([
                'codTurma' => $request->codTurma,
                'dataInicio' => $request->dataInicio,
                'dataFim' => $request->dataFim,
                'qtdAlunos' => $request->qtdAlunos,
            ]);

            // Retornar um status de sucesso
            return response()->json([
                'status' => 'success',
                'message' => 'Turma criada com sucesso!',
            ]);
        } catch (\Exception $e) {
            // Retornar um status de erro
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(turma $turma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(turma $turma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, turma $turma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(turma $turma)
    {
        //
    }
}
