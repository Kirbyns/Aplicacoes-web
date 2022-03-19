@extends('layouts.externo')
@section('title','Lista de Clientes')
@section('sidebar')
    @parent
    <hr>
@endsection

@section('content')

        <table class="table">
        <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Endereço</td>
                <td>Telefone</td>
                <td>Email</td>
        </tr>

        @foreach ($clientes as $clientes)
        <tr>
            <td>{{$clientes->id}}</td>
            <td>{{$clientes->nome}}</td>
            <td>{{$clientes->endereco}}</td>
            <td>{{$clientes->telefone}}</td>
            <td>{{$clientes->email}}</td>
        </tr>
        @endforeach


     </table>
@endsection


