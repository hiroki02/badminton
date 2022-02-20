<?php

namespace App\Http\Controllers;
use App\Http\Requests\RacketRequest;
use App\Racket;
use App\Type;
use App\Weight;
use App\Grip;
use Illuminate\Http\Request;
use Storage;

class RacketController extends Controller
{
    public function show(Racket $racket)
    {
        return view('rackets/show')->with(['racket' => $racket]);
    }
    public function index(Racket $racket, Request $request)
    {
        // $rackets = Racket::all();

        $keyword = $request->input('keyword');
        $query = Racket::query();
        
        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }
        
        $rackets = $query->paginate(5);;

        return view('rackets.index', ['rackets' => $rackets] , compact('rackets', 'keyword'));
        // ->with(['rackets' => $racket->getPaginateByLimit()])
    }
    public function store(Request $request, Racket $racket)
    {
        $input = $request['racket'];
        $input += ['user_id' => $request->user()->id];
                //s3アップロード開始
        $image = $request->file('image');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
        $racket->image_path = Storage::disk('s3')->url($path);
        $racket->fill($input)->save();
        return redirect('/rackets/' . $racket->id);
    }
        public function add()
    {
        return view('rackets.create');
    }
    public function create(Type $type, Weight $weight, Grip $grip)
    {
        return view('rackets/create')->with(['types' => $type->get() ,'weights' => $weight->get() ,'grips' => $grip->get()]);;
    }
    public function edit(Racket $racket, Type $type, Weight $weight, Grip $grip)
    {
        return view('rackets/edit')->with(['racket'=>$racket, 'types' => $type->get() ,'weights' => $weight->get() ,'grips' => $grip->get()]);
    }
    public function update(RacketRequest $request, Racket $racket)
    {
        $input_racket = $request['racket'];
        $input_racket += ['user_id' => $request->user()->id];
        $racket->fill($input_racket)->save();

        return redirect('/rackets/' . $racket->id);
    }
    public function delete(Racket $racket)
    {
        $racket->delete();
        return redirect('/');
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
