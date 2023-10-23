<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Init project

1. Installa le dipendenze di frontend

```
npm install
```

2. Fai partire il compilatore per i file di frontend

```
npm run dev
```

3. Installa le dipendenze di backend in un nuovo terminale

```
composer install
```

4. Fai partire il server di sviluppo backend

```
php artisan serve
```

5. Copia il file `.env.example` e chiamalo `.env`. Poi esegui il comando per generare la chiave

```
php artisan key:generate
```

## Connessione al DB

1. Avvio MAMP

2. Apro [PHPMyAdmin](http://localhost/phpMyAdmin/?lang=en)

3. Creo un nuovo DB (es. `103_rent`)

4. nel file `.env` aggiungo i parametri di connessione presenti sulla [pagina iniziale di MAMP](http://localhost/MAMP/)

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=103_rent
DB_USERNAME=root
DB_PASSWORD=root
```

## Creazione di una Migration

Per creare una tabella lanciare il comando

```
php artisan make:migration create_comics_table
```

Aggiungi poi tutte le colonne che rappresentano la tabella nella funzione `up()`. I tipi di dato disponibili sono [qui](https://laravel.com/docs/9.x/migrations#available-column-types)

```php
// create_comics_table

 public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('thumb')->nullable();
            $table->string('price', 8, 2);
            $table->string('series');
            $table->date('sale_date')->nullable();
            $table->string('type');
            // $table->json('artists');
            // $table->json('writers');
            $table->timestamps();
        });
    }
```

Eseguo la migrazione appena creata con il comando

```
php artisan migrate
```

## Aggiunta di dati

Aggiungo un paio di righe da [PHPMyAdmin](http://localhost/phpMyAdmin/?lang=en) per visualizzare dati di esempio

## Creazione di un Model

Creo un Model che rappresenti la tabella appena realizzata con il comando

```
php artisan make:model Comics
```

## Creazione di un Controller per la risorsa

Creo un Controller per la risorsa `Comic` con il comando

```
php artisan make:controller ComicController
```

Importo il controller nel file `routes/web.php` per assegnargli delle rotte

````php
// web.php

use App\Http\Controllers\ComicController;

// ...

// # Rotte risorsa comic
Route::get('/', [PageController::class, 'index'])->name('home');

Route::resource('comics', ComicController::class);


Realizzo una funzione contenente la logica del metodo legato in `routes/web.php` dentro il controller `ComicController.php`. Dovremo

1. importare il modello `Comic`
2. nel metodo `index()` recuperare tutte gli elementi della tabella e passarli ad una vista

```php
// ComicController.php


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * #@return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

## Creazione di una vista per visualizzare i dati

creo un file `resources\views\comic\index.blade.php` e estendo il layout `app.blade.php`.
In un foreach stamperò tutti i dati ricevuti

```php
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

````
