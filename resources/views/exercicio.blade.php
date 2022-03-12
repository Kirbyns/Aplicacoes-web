@extends('layouts.exerciciolayout')
@section('title','Minha view de exercicio')
@section('sidebar')
@parent
<hr>
@endsection


@section('content')
@foreach ($textos as $texto )
<tr><td>textos teste #{{$texto['id']}} <br> {{$texto['texto']}}<hr></td></tr>
@endforeach


<table class="table">
    <button type="submit" @disabled($mostrar)>clique para mostrar</button>
    @if($mostrar)
    <div class="alert alert-danger" role="alert">
        ATENÇÃO: Lembre dos avisos
    </div>
    @else
    @endif
</table>

@endsection

