<?php

namespace App\Http\Controllers;
use App\Racket;
use Illuminate\Http\Request;

class RacketController extends Controller
{
    public function show(Racket $racket)
    {
        return view('rackets/show')->with(['racket' => $racket]);
    }
    public function index(Racket $racket)
    {
        return view('rackets/index')->with(['rackets' => $racket->getPaginateByLimit()]); 
    }
    public function create()
    {
        return view('rackets/create');
    }
}
