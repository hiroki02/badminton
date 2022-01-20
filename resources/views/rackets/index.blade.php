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
                    <p class='type_id'>{{ $racket->type_id }}</p>
                    <p class='weight_id'>{{ $racket->weight_id }}</p>
                    <p class='grip_id'>{{ $racket->grip_id }}</p>
                    <p class='maker'>{{ $racket->maker }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $rackets->links() }}
    </body>
</html>
@endsection