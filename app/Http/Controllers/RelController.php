<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Rel;
use App\Models\Turma;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $turmas = Turma::all();
        $alunos = Aluno::all();

        $relacionamento = Rel::join('alunos', 'alunos.id_aluno', '=', 'rels.alunos_id')
            ->join('turmas', 'turmas.id_turma', '=', 'rels.turmas_id')
            ->get();

        return Inertia::render('Dashboard', [
            'relacionamento' => $relacionamento,
            'turmas' => $turmas,
            'alunos' => $alunos,
        ]);
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
            'alunos_id' => 'required',
            'turmas_id' => 'required',
        ]);
        try {
            $turma = Turma::find($request->turmas_id);

            if ($turma->qtdAlunos <= Rel::where('turmas_id', $request->turmas_id)->count()) {
                return response()->json(['errors' => 'A turma atingiu o limite máximo de alunos permitidos.']);
            } else {
                Rel::create([
                    'alunos_id' => $request->alunos_id,
                    'turmas_id' => $request->turmas_id,
                ]);
                return redirect(route('dashboard'));
            }
        } catch (\Exception $e) {
            return response()->json(['errors' => 'Não foi inserido']);
            // return redirect(route('CadastroTurma'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $turmas = Turma::all();
        $alunos = Aluno::all();

        return Inertia::render('sala/CadastroSala', [
            'turmas' => $turmas,
            'alunos' => $alunos,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $relacionamento = Rel::find($id);
        $turmas = Turma::all();
        $alunos = Aluno::all();
    
        return Inertia::render('sala/EditSala', [
            'turmas' => $turmas,
            'alunos' => $alunos,
            'relacionamento' => $relacionamento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'alunos_id' => 'required',
            'turmas_id' => 'required',
        ]);
        try {
            $turma = Turma::find($request->turmas_id);

            if ($turma->qtdAlunos <= Rel::where('turmas_id', $request->turmas_id)->count()) {
                // return response()->json(['errors' => 'A turma atingiu o limite máximo de alunos permitidos.']);
            } else {
                Rel::where('id_rels', $request->id_rels)->update([
                    'alunos_id' => $request->alunos_id,
                    'turmas_id' => $request->turmas_id,
                ]);
                return redirect(route('dashboard'));
            }
        } catch (\Exception $e) {
            return redirect(route('dashboard'));
            return response()->json(['errors' => 'Não foi inserido']);
            // return redirect(route('CadastroTurma'));
        }
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Rel::find($id)->delete();
        return redirect(route('dashboard'));
    }
}
