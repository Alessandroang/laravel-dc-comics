<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

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


    /**
     * Show the form for creating a new resource.
     *
     * * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida i dati del form
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'thumb' => 'string|nullable',
            'price' => 'string|nullable',
            'series' => 'string|nullable',
            'sale_date' => 'date|nullable',
            'type' => 'string|nullable',
        ]);

        // Crea un nuovo fumetto
        $comic = new Comic;
        $comic->title = $request->input('title');
        $comic->description = $request->input('description');
        $comic->thumb = $request->input('thumb');
        $comic->price = $request->input('price');
        $comic->series = $request->input('series');
        $comic->sale_date = $request->input('sale_date');
        $comic->type = $request->input('type');



        // Salva il fumetto nel database
        $comic->save();




        return redirect()->route('comics.show', $comic)
            ->with('message', 'Fumetto creato con successo.')
            ->with('message_type', 'success');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * #@return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * #@return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        // Aggiorna le proprietà del fumetto con i nuovi dati
        $comic->title = $request->input('title');
        $comic->description = $request->input('description');
        $comic->thumb = $request->input('thumb');
        $comic->price = $request->input('price');
        $comic->series = $request->input('series');
        $comic->sale_date = $request->input('sale_date');
        $comic->type = $request->input('type');

        // Salva il fumetto nel database
        $comic->save();

        return redirect()->route('comics.show', $comic)

            ->with('message', 'Fumetto modificato con successo.')
            ->with('message_type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('home')
            ->with('message', 'Fumetto eliminato con successo.')
            ->with('message_type', 'danger');
    }
}
