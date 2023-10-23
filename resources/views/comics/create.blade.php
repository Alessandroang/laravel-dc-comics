@extends('layouts.app')

@section('main-content')
    <div class="container">
        <a href="{{ route('home') }}" class="btn btn-success my-4">
            Torna alla lista Fumetti
        </a>

        <h1 class="my-4">Crea il tuo fumetto</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <h3>Correggi i seguenti errori</h3>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('comics.store') }}" method="POST" class="row g-3">
            @csrf <!-- Aggiunto il token CSRF -->

            <div class="col-3">
                <label for="title">Titolo</label>
                <input type="text" name="title" id="title"
                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-3">
                <label for="price">Prezzo</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">

            </div>

            <div class="col-3">
                <label for="series">Serie</label>
                <input type="text" name="series" id="series" class="form-control" value="{{ old('series') }}">

            </div>

            <div class="col-3">
                <label for="sale_date">Data di Creazione</label>
                <input type="date" name="sale_date" id="sale_date" class="form-control" value="{{ old('sale_date') }}">

            </div>

            <div class="col-3">
                <label for="type">Tipo</label>
                <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}">

            </div>

            <div class="col-12">
                <p>Inserisci qui l'immagine del tuo fumetto</p>
                <input type="file" name="image" id="image" class="form-control">

            </div>

            <div class="col-12">
                <label for="description">Descrizione</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                    rows="4">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Inserisci Fumetto</button>
            </div>
        </form>

    </div>
@endsection
