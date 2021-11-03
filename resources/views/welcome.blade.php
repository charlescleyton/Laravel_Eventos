@extends('layouts.main')

@section('title', 'TIRaiz Events')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="eventos-containe" class="col-md-12">
    @if($search)
    <h2>Buscando por {{ $search }} </h2>
    @else
    <h3>Veja os Eventos dos próximos dias</h3>
    @endif
    <div id="cards-container" class="row">
        @foreach($eventos as $evento)
        <div class="card col-md-3">
            <img src="../img/eventos/{{ $evento->image }}" alt="{{ $evento->title }}">
            <div class="card-body">
                <p class="card-date">{{ date ('d/m/y', strtotime($evento->date)) }}</p>
                <h5 class="card-title">{{ $evento->title }}</h5>
                <p class="card-participantes">X Participantes</p>
                <a href="/eventos/{{ $evento->id }}" class="btn btn-primary">Saber Mais</a>
            </div>
        </div>
        @endforeach
        @if(count($eventos)==0 && $search)
        <p>Não há eventos registrados com {{ $search }}! <a href="/">Clique para ver todos!</a></p>
        @elseif(count($eventos)==0)
        <p>Não há eventos registrados</p>
        @endif
    </div>

</div>


@endsection
