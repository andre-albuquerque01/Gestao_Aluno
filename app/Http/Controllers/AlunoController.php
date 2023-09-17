<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
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
        $cpfSemMascara = preg_replace("/[^0-9]/", "", $request->cpf);
        // dd($request->all());
        $request->validate([
            'nome' => 'required|string|max:100',
            'cpf' => 'required|unique:alunos,cpf',
            'sexo' => 'required',
            'dataNasc' => 'required|date',
            'email' => 'required|email|unique:alunos,email',
        ]);
        try {
            // Inserir na tabela 'aluno'
            Aluno::create([
                'nome' => $request->nome,
                'cpf' => $cpfSemMascara,
                'sexo' => $request->sexo,
                'dataNasc' => $request->dataNasc,
                'email' => $request->email,
                'rendaMensal' => $request->rendaMensal,
            ]);

            // Retornar um status de sucesso
            return response()->json([
                'status' => 'success',
                'message' => 'Aluno cadastrado com sucesso!',
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
    public function show(aluno $aluno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(aluno $aluno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, aluno $aluno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(aluno $aluno)
    {
        //
    }
}
