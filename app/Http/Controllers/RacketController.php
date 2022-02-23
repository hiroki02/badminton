<?php

namespace App\Http\Controllers;
use App\Http\Requests\RacketRequest;
use App\Http\Requests\EditRequest;
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
        // ラケットモデルのデータの詳細画面に返す
        return view('rackets/show')->with(['racket' => $racket]);
    }
    public function index(Racket $racket, Request $request)
    {
        // 検索するテキストを取得
        $keyword = $request->input('keyword');
        $query = Racket::query();
        
        // キーワードが入力されている場合に実行しqueryモデルが結果を取得する
        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }
        
        // ラケットモデルがqueryモデルに入る。（順番は新しく登録した順で８つ以上データがある場合ページネーションを行う）
        $rackets = $query->orderBy('updated_at', 'DESC')->paginate(8);

        // ラケットの一覧画面に返す
        return view('rackets.index', ['rackets' => $rackets] , compact('rackets', 'keyword'));
    }
    public function store(RacketRequest $request, Racket $racket)
    {
        // inputはラケットラケットのデータが格納
        $input = $request['racket'];
        
        // inputがユーザーのIDを追加する
        $input += ['user_id' => $request->user()->id];
        
        //s3アップロード開始
        $image = $request->file('image');
        
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
        $racket->image_path = Storage::disk('s3')->url($path);
        
        // ラケットモデルの中にinputデータの保存
        $racket->fill($input)->save();
        
        // ラケットIDを基にラケットの詳細画面に返す
        return redirect('/rackets/' . $racket->id);
    }
        public function add()
    {
        // ラケットの作成画面に返す
        return view('rackets.create');
    }
    public function create(Type $type, Weight $weight, Grip $grip)
    {
        // ラケットの作成画面に返す
        return view('rackets/create')->with(['types' => $type->get() ,'weights' => $weight->get() ,'grips' => $grip->get()]);;
    }
    public function edit(Racket $racket, Type $type, Weight $weight, Grip $grip)
    {
        // ラケットの編集画面に返す
        return view('rackets/edit')->with(['racket'=>$racket, 'types' => $type->get() ,'weights' => $weight->get() ,'grips' => $grip->get()]);
    }
    public function update(EditRequest $request, Racket $racket)
    {
        // input_racketはラケットのデータを格納
        $input_racket = $request['racket'];
        
        // ユーザーのIDを追加
        $input_racket += ['user_id' => $request->user()->id];
        
        // ファイルに画像を入れた場合に処理を行う
        if($image = $request->file('image'))
        {
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
        $image_path = Storage::disk('s3')->url($path);
        
        // ラケットモデルに新たな画像を追加
        $input_racket +=['image_path' => $image_path];
        
        // ラケットモデルの中にinput_racketのデータを保存
        $racket->fill($input_racket)->save();
        }
        // ファイルに画像を入れない場合の処理
        else
        {
        // ラケットモデルの中にinput_racketのデータを保存
            $racket->fill($input_racket)->save();
        }
        
        // ラケット詳細画面に返す
        return redirect('/rackets/' . $racket->id);
    }
    public function delete(Racket $racket)
    {
        // ラケットのモデルを削除し、ラケットの一覧画面に返す
        $racket->delete();
        return redirect('/');
    }
}
