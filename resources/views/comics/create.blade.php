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
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-3">
                <label for="price">Prezzo</label>
                <input type="text" name="price" id="price"
                    class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-3">
                <label for="series">Serie</label>
                <input type="text" name="series" id="series"
                    class="form-control @error('series') is-invalid @enderror" value="{{ old('series') }}">
                @error('series')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-3">
                <label for="sale_date">Data di Creazione</label>
                <input type="date" name="sale_date" id="sale_date"
                    class="form-control @error('sale_date') is-invalid @enderror" value="{{ old('sale_date') }}">
                @error('sale_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-3">
                <label for="type">Tipo</label>
                <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror"
                    value="{{ old('type') }}">
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <p>Inserisci qui l'immagine del tuo fumetto</p>
                <input type="file" name="image" id="image"
                    class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label for="description">Descrizione</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                    rows="4">{{ old('description') }}</textarea>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Inserisci Fumetto</button>
            </div>
        </form>

    </div>
@endsection
