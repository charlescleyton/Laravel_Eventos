@extends('layouts.main')

@section('title', '{{ $evento->title }}')

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="../img/eventos/{{ $evento->image }}" class="img-fluid" alt="{{ $evento->title }}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{ $evento->title }}</h1>
            <p class="evento-date">
                <ion-icon name="calendar-outline"></ion-icon>{{ date ('d/m/y', strtotime($evento->date)) }}
            </p>
            <p class="evento-city">
                <ion-icon name="location-outline"></ion-icon>{{ $evento->city }}
            </p>
            <p class="evento-participants">
                <ion-icon name="people-outline"></ion-icon>X Participantes
            </p>
            <p class="evento-owner">
                <ion-icon name="star-outline"></ion-icon>{{ $eventOwner['name'] }}
            </p>
            <a href="#" class="btn btn-primary" id="event-submit">Confirmar Presença</a>
            <h3>O evento conta com:</h3>
            <ul id="items-list">
                @foreach($evento-> items as $item)
                <li>
                    <ion-icon name='play-outline'></ion-icon>{{ $item }}
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Sobre o Evento</h3>
            <p class="event-description">{{ $evento->description }}</p>
        </div>
    </div>

</div>

@endsection
