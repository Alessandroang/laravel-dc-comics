@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
    <h1>{{ $title }}</h1>
    
  <table class="table table-bordered mt-4">
    <thead>
      <tr>
        <th>Immagine</th>
        <th>Titolo</th>
        <th>Prezzo</th>
        <th>Serie</th>
        <th>Data di Vendita</th>
        <th>Tipo</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($comics as $comic)
        {{-- <tr>
          <td><img src="{{ $comic->thumb }}" alt="{{ $comic->title }}" style="width: 100px;"></td>
          <td>{{ $comic->title }}<br>
            Trama: 
          {{$comic->description}}</td>
          <td>{{ $comic->price }}</td>
          <td>{{ $comic->series }}</td>
          <td>{{ $comic->sale_date }}</td>
          <td>{{ $comic->type }}</td>
        </tr> --}}
      @endforeach
    </tbody>
  </table>
  </div>
</section>
@endsection
