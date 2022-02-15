@extends('layouts.app')　　　　　　　　　　　　　　　　　　
@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <p class="edit">[<a href="/rackets/{{ $racket->id }}/edit">編集画面へ</a>]</p>
        <form action="/rackets/{{ $racket->id }}" id="form_{{ $racket->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">削除する</button> 
        </form>
        <title>Rackets</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1 class="name">
            {{ $racket->name }}
        </h1>
        <img src="{{ $racket->image_path }}">
        <div class="content">
            <div class="content__racket">
                <h2>ラケットのタイプ</h2>
                <p class='type_id'>{{ $racket->type->name}}</p>
                <h2>ラケットの重さ</h2>
                <p class='weight_id'>{{ $racket->weight->name }}</p>
                <h3>グリップの長さ</h3>
                <p class='grip_id'>{{ $racket->grip->name }}</p>
                <h4>販売メーカー</h4>
                <p class='maker'>{{ $racket->maker }}</p>
                <h5>感想</h5>
                <p>{{ $racket->body }}</p>    
            </div>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
    
    <h7>＜コメント＞</h7>
    <ul>
        @forelse ($racket->comments as $comment)
        <li>{{ $comment->body }}</li>
        @empty
        <li>まだコメントはありません。</li>
        @endforelse
    </ul>
    
    <h8>コメント追加欄</h8>
    <form method="post" action="{{ action('CommentController@store', $racket->id) }}">
        {{ csrf_field() }}
        <p>
            <input type="text" name="body" placeholder="body" value="{{ old('body') }}">
            @if ($errors->has('body'))
            <span class="error">{{ $errors->first('body') }}</span>
            @endif
        </p>
        <p>
            <input type="submit" value="コメント追加">
        </p>
    </form>
</html>
@endsection