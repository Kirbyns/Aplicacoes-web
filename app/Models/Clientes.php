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

    public function compras()
    {
        return $this->hasMany(Vendas::class,'cliente_id');
    }

    use HasFactory;
}
