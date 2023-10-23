@extends('layouts.app')

@section('main-content')
    <div class="container">
        <a href="{{ route('home') }}" class="btn btn-success my-4">
            Torna alla lista Fumetti
        </a>

        <a href="{{ route('comics.show', $comic) }}" class="btn btn-success my-4">
            Mostra i Dettagli
        </a>

        <h1 class="my-4">Modifica il tuo fumetto</h1>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-4">
                <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}" class="img-fluid">
            </div>
            <div class="col-md-8">
                <form action="{{ route('comics.update', $comic) }}" method="POST" class="row g-3">
                    @csrf <!-- Aggiunto il token CSRF -->
                    @method('PATCH')

                    <div class="col-3">
                        <label for="titolo">Titolo</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ $comic->title }}">
                    </div>

                    <div class="col-3">
                        <label for="thumb">Thumb</label>
                        <input type="text" name="thumb" id="thumb" class="form-control"
                            value="{{ $comic->thumb }}">
                    </div>

                    <div class="col-3">
                        <label for="prezzo">Prezzo</label>
                        <input type="text" name="price" id="price" class="form-control"
                            value="{{ $comic->price }}">
                    </div>

                    <div class="col-3">
                        <label for="serie">Serie</label>
                        <input type="text" name="series" id="series" class="form-control"
                            value="{{ $comic->series }}">
                    </div>

                    <div class="col-3">
                        <label for="data_vendita">Data di Vendita</label>
                        <input type="date" name="sale_date" id="sale_date" class="form-control"
                            value="{{ $comic->sale_date }}">
                    </div>

                    <div class="col-3">
                        <label for="tipo">Tipo</label>
                        <input type="text" name="type" id="type" class="form-control"
                            value="{{ $comic->type }}">
                    </div>

                    <div class="col-12">
                        <label for="descrizione">Descrizione</label>
                        <textarea name="description" id="description" class="form-control" rows="9">{{ $comic->description }}</textarea>
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Modifica Fumetto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
