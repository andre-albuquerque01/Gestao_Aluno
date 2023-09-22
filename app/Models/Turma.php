<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $primaryKey = 'id_turma';
    protected $fillable = [
        'codTurma',
        'dataInicio',
        'dataFim',
        'qtdAlunos',
    ];

}