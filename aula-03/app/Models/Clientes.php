<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{

    //define colunas

    protected $fillable =[
        'id',
        'nome',
        'endereco',
        'email',
        'telefone',
    ];

    //define tabela
    protected $table ='Clientes' ;



    use HasFactory;
}
