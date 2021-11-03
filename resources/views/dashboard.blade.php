@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h2>Meus Eventos</h2>
</div>
<div class="col-md10 offset-md-1 dashboard-eventos-container">
    @if(count($eventos) > 0)
    @else
    <p>Você ainda não tem evento, <a href="/eventos/criar">Clique aqui para Criar um evento</a></p>
    @endif

</div>

@endsection
