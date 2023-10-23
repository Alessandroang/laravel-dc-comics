@extends('layouts.app')

@section('main-content')
    <div class="container mt-5">
        <a href="{{ route('home') }}" class="btn btn-success my-4">
            Torna alla lista Fumetti
        </a>
        <a href="{{ route('comics.edit', $comic) }}" class="btn btn-warning my-4">
            Modifica Fumetto
        </a>
        <h1>Dettagli del Fumetto</h1>

        <div class="card mt-4">
            <div class="row">

                <div class="col-md-4">
                    <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comic->title }}</h5>
                        <p class="card-text"><strong>Trama:</strong> {{ $comic->description }}</p>
                        <p class="card-text"><strong>Prezzo:</strong> {{ $comic->price }}</p>
                        <p class="card-text"><strong>Serie:</strong> {{ $comic->series }}</p>
                        <p class="card-text"><strong>Data di Vendita:</strong> {{ $comic->sale_date }}</p>
                        <p class="card-text"><strong>Tipo:</strong> {{ $comic->type }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
