<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rel extends Model
{
    use HasFactory;
    protected $fillable = [
        'alunos_id',
        'turmas_id',
    ];
}
