<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClientesController extends Controller
{
    private int $qtd_por_pagina = 5;
    public function __construct(){

        //Só usuário logado pode acessar
        //qualquer método desta controller
        //$this->middleware('auth');
    }

    public function index(Request $request){
        $data = Clientes::orderBy('id', 'DESC')->paginate($this->qtd_por_pagina);

        return view('clientes.index', compact('clientes'))

        ->with('i', ($request->input('page', 1) - 1)* $this->qtd_por_pagina);



      }
      publict function create(){
          return view ('clientes.create');

      }
      publict function store (Request $request){

      }
      Publict function show ($id){
        $cliente = Clientes::find($id);
        return view('clientes.show',compact('cliente'));
    }
    public function edit($id){
        $cliente = Clientes::find($id);
        return view ('clientes.edit', compact('cliente'));
    }

    publict function update(Request $request, $id){

        $cliente = Clientes::find($id);
        $inputs = $request->all();
        $cliente ->update($inputs);

        return redirect()->route('clients.index')->with('success', 'Cliente Atualizado');
    }

    public function destroy($id){
        Clientes::find($id)->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente apagado')

    }
}

