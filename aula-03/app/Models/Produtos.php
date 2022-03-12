<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'venda_id',
        'produto_id',
        'quantidade',
        'valor'
       ];

protected $table ='ProdutosVenda';
}
