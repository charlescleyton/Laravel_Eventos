@extends('layouts.main')

@section('title', 'criar')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h3>Crie seu evento</h3>
    <form action="/eventos" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image" class="form-label">Imagem do Evento:</label>
            <input type="file" class="form-control-file" name="image" id="image">
        </div>
        <div class="form-group">
            <label for="title" class="form-label">Evento:</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Nome do Evento">
        </div>
        <div class="form-group">
            <label for="date" class="form-label">Data do Evento:</label>
            <input type="date" class="form-control" name="date" id="date" placeholder="Nome do Evento">
        </div>
        <div class="form-group">
            <label for="city" class="form-label">Cidade</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="Cidade do Evento">
        </div>
        <div class="form-group">
            <label for="private" class="form-label">O Evento é privado?</label>
            <select class="form-control" name="private" id="private">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title" class="form-label">Descrição:</label>
            <textarea class="form-control" name="description" id="description" placeholder="Descrição do Evento"></textarea>
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

        <input type="submit" class="btn btn-primary" value="Criar Evento">

    </form>
</div>
@endsection
