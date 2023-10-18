@extends('layouts.app')

@section('main-content')
<div class="container">
  <h1 class="mt-4">Tabella dei Treni</h1>
  <table class="table table-bordered mt-4">
    <thead>
      <tr>
        {{-- <th>Azienda</th> --}}
        <th>Stazione di Partenza</th>
        <th>Stazione di Arrivo</th>
        <th>Orario di Partenza</th>
        <th>Orario di Arrivo</th>
        <th>Data di Partenza</th>
        <th>Data di Arrivo</th>
        <th>Codice Treno</th>
        <th>Numero Carrozze</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($trains as $train)
        <tr>
          {{-- <td>{{ $train->azienda }}</td> --}}
          <td>{{ $train->stazione_partenza }}</td>
          <td>{{ $train->stazione_arrivo }}</td>
          <td>{{ substr($train->orario_di_partenza, 0, 5) }}</td> 
          <td>{{ substr($train->orario_di_arrivo, 0, 5) }}</td>
          <td>{{ date('d/m/Y', strtotime($train->data_di_partenza)) }}</td>
          <td>{{ date('d/m/Y', strtotime($train->data_di_arrivo)) }}</td>
          <td>{{ $train->codice_treno }}</td>
          <td>{{ $train->numero_carrozze }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
