<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function Termwind\render;

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
        // Remover mascara
        // $cpfSemMascara = preg_replace("/[^0-9]/", "", $request->cpf);
        $cpf = preg_replace('/[^0-9]/', '', $request->cpf);
        // Adiciona a máscara de CPF (999.999.999-99)
        $cpfComMascara = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
        // dd($request->all());
        $request->validate([
            'nome' => 'required|string|max:100',
            'cpf' => 'required|max:14|min:14|unique:alunos,cpf',
            'sexo' => 'required',
            'dataNasc' => 'required|date',
            'email' => 'required|email|unique:alunos,email',
        ]);
        if ($request->rendaMensal == "") $rendaMenal = 0;
        else $rendaMenal = $request->rendaMensal;
        try {
            // Inserir na tabela 'aluno'
            Aluno::create([
                'nome' => $request->nome,
                'cpf' => $cpfComMascara,
                'sexo' => $request->sexo,
                'dataNasc' => $request->dataNasc,
                'email' => $request->email,
                'rendaMensal' => $rendaMenal,
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
    public function show($id)
    {
        $aluno = Aluno::find($id);
        if (!$aluno) {
            // Trate o caso em que o aluno não foi encontrado, como redirecionar para uma página de erro ou retornar uma resposta adequada.
        }
        Inertia::share('aluno', $aluno);

        return Inertia::render('aluno/EditAluno');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aluno $aluno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $cpfSemMascara = preg_replace("/[^0-9]/", "", $request->cpf);
        // dd($request->all());
        $request->validate([
            'nome' => 'required|string|max:100',
            // 'cpf' => 'required|max:14|min:14|unique:alunos,cpf',
            'sexo' => 'required',
            'dataNasc' => 'required|date',
            'email' => 'required|email',
        ]);
        if ($request->rendaMensal == "") $rendaMenal = 0;
        else $rendaMenal = $request->rendaMensal;
        try {
            // Inserir na tabela 'aluno'
            Aluno::where('id', $request->id)->update([
                'nome' => $request->nome,
                'sexo' => $request->sexo,
                'dataNasc' => $request->dataNasc,
                'email' => $request->email,
                'rendaMensal' => $rendaMenal,
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
     * Remove the specified resource from storage.
     */
    public function destroy(Aluno $aluno)
    {
        //
    }
}
