<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClientesController extends Controller
{
    public function listar(){
        $clientes = Clientes::all();

        return view('clientes.listar',['clientes' => $clientes]);
    }
    public function __construct(){
        //só usuario logado pode acessar (comentou a debaixo para chamar o middleware na rota)
      //  $this->middleware('auth');
    }


}
