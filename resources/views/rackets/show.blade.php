@extends('layouts.app')　　　　　　　　　　　　　　　　　　
@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <h2>
        　　ユーザー　{{Auth::user()->name}}
    </h2>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--グリッドで2列に表示させる-->
        <div class="container-fluid">
            <div class="row">
                <p class="edit col-6">
                    <a class="btn btn-primary" href="/rackets/{{ $racket->id }}/edit" role="button">編集画面へ</a>
                </p>
                <form action="/rackets/{{ $racket->id }}" id="form_{{ $racket->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit col-6" class="btn btn-danger">削除する</button> 
                </form>
            </div>
        </div>
    <title>Rackets</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1 class="name">
            {{ $racket->name }}
        </h1>
        <!--グリッドで縞模様に2列に表示させる-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <img src="{{ $racket->image_path }}"class="img-thumbnail" class="img-fluid">
                </div>
                <div class="col-6">
                    <div class="content">
                        <table class="table table-striped">
                            <div class="content__racket">
                                <tr><td>
                                <h2>ラケットのタイプ</h2>
                                </td><td>
                                <p class='type_id'>{{ $racket->type->name}}</p>
                                </td></tr>
                                <tr><td>
                                <h2>ラケットの重さ</h2>
                                </td><td>
                                <p class='weight_id'>{{ $racket->weight->name }}</p>
                                </td></tr>
                                <tr><td>
                                <h2>グリップの長さ</h2>
                                </td><td>
                                <p class='grip_id'>{{ $racket->grip->name }}</p>
                                </td></tr>
                                <tr><td>
                                <h2>販売メーカー</h2>
                                </td><td>
                                <p class='maker'>{{ $racket->maker }}</p>
                                </td></tr>
                                <tr><td>
                                <h2>感想</h2>
                                </td><td>
                                <p>{{ $racket->body }}</p>  
                                </td></tr>
                            </div>
                        </table>
                    </div>
                        <div class="footer">
                            <h2>
                                <a href="/">戻る</a>
                            </h2>
                        </div>
                </div>
            </div>
       </div> 
    </body>
    
    <h2>＜コメント＞</h2>
    <ul>
        <!--ラケットモデルにコメントがあるまで繰り返す-->
        @forelse ($racket->comments as $comment)
        <!--グリッドを用いて4等分にする-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <li>{{ $comment->body }}</li>
                </div>
                <div class="col-3">
                    <p>ユーザー名・{{ $comment->user->name }}<p>
                </div>
                <div class="col-3">
                    <p><a class="btn btn-primary" href="/comments/{{ $comment->id }}/edit" role="button">編集</a></p>
                </div>
                <div class="col-3">
                    <form action="/comments/{{ $comment->id }}" id="form_{{ $comment->id }}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">削除</button> 
                    </form>
                </div>
            </div>
        </div>
        <!--コメントのデータがない場合-->
        @empty
        <li>まだコメントはありません。</li>
        @endforelse
    </ul>
    
    <h7>　コメント追加欄</h7>
    <form method = "post" action="{{ action('CommentController@store', $racket->id) }}">
        {{ csrf_field() }}
        <p>
            <input type="text" name="comment[body]" placeholder="body" value="{{ old('body') }}">
            <!--コメントに文を入れていないときに追加ボタンを押した際に処理する-->
            @if ($errors->has('comment.body'))
            <!--バリデーションの表示-->
            <p class="body__error" style="color:red">{{ $errors->first('comment.body') }}</p>
            @endif
        </p>
        <p>
            <input type="submit" class="btn btn-primary" value="コメント追加">
        </p>
    </form>
</html>
@endsection