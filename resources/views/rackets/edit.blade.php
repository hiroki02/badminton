@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <h2>
        　　ユーザー　{{Auth::user()->name}}
    </h2>
    <head>
        <meta charset="utf-8">
        <title>ラケット管理</title>
    </head>
<body>
    <h1 class="title">編集画面</h1>
        <div class="content">
        <form action="/rackets/{{ $racket->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
        <!--グリッドによる2列の表示-->
        <div class="container-fluid">
        <div class="row">
        <div class="col-6">
            <!--画像の挿入（変更しなくてもよい）-->
            <br>
                <label for="image">画像を変更したい場合はファイルを選択してください </label>
            </br>
                <input type="file" name="image" value="{{$racket->image_path}}">
        </div>
        <div class="col-6">
            <div class='content__title'>
                    <h2>ラケット名</h2>
                    <!--ラケットの名前をテキストで入れる-->
                    <input type='text' name='racket[name]' value="{{ $racket->name }}">
                </div>
            </div>
            <div class="col-6">
                <div class='content__type'>
                    <h2>Type</h2>
                    <select name="racket[type_id]">
                        <!--foreachでタイプテーブルのデータを表示させ選択させる-->
                    @foreach($types as $type)
                        <!--作成したラケットのタイプのIDが初期のタイプのIDの選択肢と一致する場合の処理-->
                        @if($type->id === $racket->type_id)
                            <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                        <!--一致しないときの処理-->
                        @else
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endif
                    @endforeach
                </select>
                </div>
            </div>
            <div class="col-6">
                <div class='content__weight'>
                    <h2>Weight</h2>
                    <select name="racket[weight_id]">
                    <!--foreachで重さテーブルのデータを表示させ選択させる-->
                    @foreach($weights as $weight)
                    <!--作成したラケットの重さのIDが初期の重さのIDの選択肢と一致する場合の処理-->
                        @if($weight->id === $racket->weight_id)
                            <option value="{{ $weight->id }}" selected>{{ $weight->name }}</option>
                            <!--一致しないときの処理-->
                        @else
                            <option value="{{ $weight->id }}">{{ $weight->name }}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class='content__grip'>
                    <h2>Grip</h2>
                    <!--foreachでグリップのテーブルのデータを表示させ選択させる-->
                    <select name="racket[grip_id]">
                    @foreach($grips as $grip)
                    <!--作成したラケットのグリップのIDが初期のグリップのIDの選択肢と一致する場合の処理-->
                        @if($grip->id === $racket->grip_id)
                            <option value="{{ $grip->id }}" selected>{{ $grip->name }}</option>
                            <!--一致しないときの処理-->
                        @else
                            <option value="{{ $grip->id }}">{{ $grip->name }}</option>
                        @endif
                    @endforeach
                </select>
                </div>
            </div>
            <div class="col-6">
                <div class='content__maker'>
                    <h2>メーカー</h2>
                    <!--メーカーの名前をテキストで入れる-->
                    <input type='text' name='racket[maker]' value="{{ $racket->maker }}">
                </div>
            </div>
            <div class="col-6">
                <div class='content__body'>
                    <h2>使ってみた感想</h2>
                    <!--感想をテキストで入れる-->
                    <input type='text' name='racket[body]' value="{{ $racket->body }}">
                </div>
            </div>
            <div class="col-6">
                  <input type="submit" class="btn btn-primary" value="保存">
            </div>
        </form>
            <h2>
                <!--ラケットのIDを基に詳細画面に戻る-->
                <div class="back"><a href="/rackets/{{ $racket->id }}{{ $racket->name }}">戻る</a></div>
            </h2>
        </div>
        </div>
    </div>
</body>
</html>
@endsection