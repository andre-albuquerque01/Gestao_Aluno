<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    // use HasFactory;
    protected $table = 'alunos'; // Nome da tabela no banco de dados
    protected $primaryKey = 'id'; // Nome da chave primária

    protected $fillable = [
        'nome',
        'cpf',
        'sexo',
        'dataNasc',
        'email',
        'rendaMensal',
    ];
}
