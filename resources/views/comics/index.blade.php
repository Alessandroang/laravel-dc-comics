@extends('layouts.app')

@section('main-content')
    <div class="container">


        <h1 class="mt-4">Dettagli dei Fumetti</h1>


        <div class="row mt-2">
            @foreach ($comics as $comic)
                <div class="col-2 g-3">
                    <div class="card h-100">
                        <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comic->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $comic->series }}</h6>

                            <p class="card-text"><strong>Prezzo:</strong> {{ $comic->price }}</p>
                            <p class="card-text"><strong>Data di Vendita:</strong> {{ $comic->sale_date }}</p>
                            <p class="card-text"><strong>Tipo:</strong> {{ $comic->type }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
