@extends('layouts.main')

@section('title', 'Editando: ' . $evento->title)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h2>Editando: {{ $evento->title }}</h2>
    <form action="/eventos/update/{{ $evento->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image" class="form-label">Imagem do Evento:</label>
            <input type="file" class="form-control-file" name="image" id="image">
        
            <img src="/img/eventos/{{ $evento->image }}" alt="{{ $evento->title }}" class="img-preview">
        </div>
        <div class="form-group">
            <label for="title" class="form-label">Evento:</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Nome do Evento" value="{{ $evento->title  }}">
        </div>
        <div class="form-group">
            <label for="date" class="form-label">Data do Evento:</label>
            <input type="date" class="form-control" name="date" id="date" value="{{ $evento->date->format('y-m-d') }}">
        </div>
        <div class="form-group">
            <label for="city" class="form-label">Cidade</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="Cidade do Evento" value="{{ $evento->city }}">
        </div>
        <div class="form-group">
            <label for="private" class="form-label">O Evento é privado?</label>
            <select class="form-control" name="private" id="private">
                <option value="0">Não</option>
                <option value="1"{{ $evento->private ==1 ? "selected='selected'" :""}}>Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title" class="form-label">Descrição:</label>
            <textarea class="form-control" name="description" id="description" placeholder="Descrição do Evento">{{ $evento->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="title" class="form-label">Adcione itens de infraestrutura:</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras">Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco">Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cerveja Grátis">Cerveja Grátis
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open Food">Open Food
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Brindes">Brindes
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Editar Evento">

    </form>
</div>
@endsection
