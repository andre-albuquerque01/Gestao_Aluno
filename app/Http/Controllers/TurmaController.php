<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function Termwind\render;

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
            'dataInicio' => 'required|date|after_or_equal:today',
            'dataFim' => 'required|date|after:dataInicio',
            'qtdAlunos' => 'required',
        ], [
            'dataInicio.after_or_equal' => 'A data de início deve ser maior ou igual à data atual.',
            'dataFim.after' => 'A data de fim deve ser maior do que a data de início.',
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
    public function show($id)
    {
        $idTurma = Turma::find($id);
        if (!$idTurma) {
            // Trate o caso em que o idTurma não foi encontrado, como redirecionar para uma página de erro ou retornar uma resposta adequada.
        }
        Inertia::share('turma', $idTurma);

        return Inertia::render('turma/EditTurma');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Turma $turma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Turma $turma)
    {
        // dd($request->all());
        $request->validate([
            'codTurma' => 'required|string|max:100',
            'dataInicio' => 'required|date',
            'dataFim' => 'required|date',
            'qtdAlunos' => 'required',
        ]);

        try {
            // Inserir na tabela 'turma'
            Turma::where('id', $request->id)->update([
                'codTurma' => $request->codTurma,
                'dataInicio' => $request->dataInicio,
                'dataFim' => $request->dataFim,
                'qtdAlunos' => $request->qtdAlunos,
            ]);

            // Retornar um status de sucesso
            return response()->json([
                'status' => 'success',
                'message' => 'Turma alterada com sucesso!',
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
     * Remove the specified resource from storage.
     */
    public function destroy(Turma $turma)
    {
        //
    }
}
