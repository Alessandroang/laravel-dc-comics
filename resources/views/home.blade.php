@extends('layouts.app')



@section('main-content')
    <section class="container mt-5">
        <a href="{{ route('comics.create') }}" class="btn btn-success">
            Crea un nuovo fumetto</a>

        <h1>{{ $title }}</h1>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titolo</th>

                    <th>Prezzo</th>
                    <th>Serie</th>
                    <th>Data di Vendita</th>
                    <th>Tipo</th>
                    <th>Modifica</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comics as $comic)
                    <tr>
                        <td scope="row">{{ $comic->id }}</td>
                        <td scope="row">{{ $comic->title }}</td>

                        <td scope="col">{{ $comic->price }}</td>
                        <td scope="col">{{ $comic->series }}</td>
                        <td scope="col">{{ $comic->sale_date }}</td>
                        <td scope="col">{{ $comic->type }}</td>
                        <td scope="col">

                            <div class="d-flex">

                                <a href="{{ route('comics.edit', $comic) }}" class="mx-1">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                <a href="{{ route('comics.show', $comic) }}" class="mx-1">
                                    <i class="fas fa-sold fa-eye"></i>
                                </a>
                                <a href="#" class="mx-1" data-bs-toggle="modal"
                                    data-bs-target="#delete-modal-{{ $comic->id }}">
                                    <i class="fa-solid fa-trash text-danger"></i>
                                </a>


                                <div class="modal fade" id="delete-modal-{{ $comic->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina Fumetto</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler eliminare definitivamente il fumetto?
                                                "{{ $comic->title }}"
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Annulla</button>

                                                <form action="{{ route('comics.destroy', $comic) }}" method="POST"
                                                    class="mx-1">
                                                    @method('DELETE')
                                                    @csrf

                                                    <button class="btn btn-danger">Elimina</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>
@endsection
