<?php

namespace App\Http\Controllers;
use App\Models\Comic;

use Illuminate\Http\Request;

class PageController extends Controller
{
  public function index()
  {
    $title = "Lista Fumetti";
    $comics = Comic::all();
    return view('home', compact('title', 'comics'));
  }
}