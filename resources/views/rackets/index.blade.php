@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ラケット管理アプリ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ラケット管理アプリ</h1>
        <div class='rackets'>
        [<a href='/rackets/create'>ラケット登録</a>]
            @foreach ($rackets as $racket)
                <div class='racket'>
                   <h2 class='name'>
                        <a href="/rackets/{{ $racket->id }}">{{ $racket->name }}</a>
                    </h2>
                    <a href="">{{ $racket->type->name }}</a>
                    <a href="">{{ $racket->weight->name }}</a>
                    <a href="">{{ $racket->grip->name }}</a>
                    <p class='type_id'>{{ $racket->type->name}}</p>
                    <p class='weight_id'>{{ $racket->weight->name }}</p>
                    <p class='grip_id'>{{ $racket->grip->name }}</p>
                    <p class='maker'>{{ $racket->maker }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $rackets->links() }}
    </body>
</html>
@endsection