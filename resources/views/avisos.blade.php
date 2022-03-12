@extends('layouts.externo')
@section('title','Minha primeira view')
@section('sidebar')
    @parent
    <hr>
@endsection

@section('content')
    <table class="table">
        @if($mostrar)
        <div class="alert alert-danger" role="alert">
            ATENÇÃO: Lembre dos avisos
        </div>
        @else
        @endif
        <tr>
            <td>
                Quadro de Avisos {{$nome}}
            </td>
        </tr>

        @foreach ($avisos as $aviso )
        <tr><td>Aviso #{{$aviso['id']}} <br> {{$aviso['aviso']}}</td></tr>
        @endforeach

        <tr><td>Aviso #1 <br> blá blá blá</td></tr>
        <tr><td>Aviso #2 <br> mais blá blá blá</td></tr>
       <!-- é possivel escreverr direto com php, segue exemplo a baixo -->
       <?php
        foreach($avisos as $aviso){
            echo "<tr><td>Aviso #{$aviso['id']} <br> {$aviso['aviso']}</td></tr>";
        }
        ?>

     </table>
@endsection


