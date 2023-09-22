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
            'dataInicio' => 'required|date|after_or_equal:today',
            'dataFim' => 'required|date|after:dataInicio',
            'qtdAlunos' => 'required',
        ]);

        try {
            // Inserir na tabela 'turma'
            Turma::where('id_turma', $request->id)->update([
                'codTurma' => $request->codTurma,
                'dataInicio' => $request->dataInicio,
                'dataFim' => $request->dataFim,
                'qtdAlunos' => $request->qtdAlunos,
            ]);

            return redirect(route('dashboard'));
            // Retornar um status de sucesso
            return response()->json([
                'status' => 'success',
                'message' => 'Turma alterada com sucesso!',
            ]);
        } catch (\Exception $e) {
            return redirect(route('dashboard'));
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
    public function destroy($id)
    {
        Turma::find($id)->delete();
        return redirect(route('dashboard'));
    }
}
