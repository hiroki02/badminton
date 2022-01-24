<?php

namespace App\Http\Controllers;
use App\Racket;
use App\Type;
use App\Weight;
use App\Grip;
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
    public function store(Request $request, Racket $racket)
    {
        $input = $request['racket'];
        $racket->fill($input)->save();
        return redirect('/rackets/' . $racket->id);
    }
    public function create(Type $type, Weight $weight, Grip $grip)
    {
        return view('rackets/create')->with(['types' => $type->get() ,'weights' => $weight->get() ,'grips' => $grip->get()]);;
    }
    // public function create(Weight $weight)
    // {
    //     return view('rackets/create')->with(['weights' => $weight->get()]);;
    // }
    // public function create(Grip $grip)
    // {
    //     return view('rackets/create')->with(['grips' => $grip->get()]);;
    // }
    // public function create()
    // {
    //     return view('rackets/create');
    // }
}
