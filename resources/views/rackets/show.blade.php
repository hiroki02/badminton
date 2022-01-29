@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <h3>グリップの重さ</h3>
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
</html>
@endsection