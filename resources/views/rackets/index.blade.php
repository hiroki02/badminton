@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    {{Auth::user()->name}}
    <head>
        <meta charset="utf-8">
        <title>ラケット管理アプリ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ラケット管理アプリ</h1>
        <h1>検索</h1>
        <form action="{{url('/rackets')}}" method="GET">
            <p><input type="text" name="keyword" value="{{ old('keyword', $keyword ?? '') }}"></p>
            <p><input type="submit" value="検索"></p>
        </form>
        
        
        <div class='rackets'>
        [<a href='/rackets/create'>ラケット登録</a>]
            @if($rackets->count())
            @foreach ($rackets as $racket)
                <div class='racket'>
                    <h2 class='name'>
                        <a href="/rackets/{{ $racket->id }}">{{ $racket->name }}</a>
                    </h2>

                    @if ($racket->image_path)
                    <img src="{{ $racket->image_path }}">
                    @endif
                    <small>{{ $racket->user->name }}</small>
                    <p class='type_id'>{{ $racket->type->name}}</p>
                    <p class='weight_id'>{{ $racket->weight->name }}</p>
                    <p class='grip_id'>{{ $racket->grip->name }}</p>
                    <p class='maker'>{{ $racket->maker }}</p>
                    <div class='paginate'>
                    {{ $rackets->appends(['keyword' => $keyword ?? ''])->links() }}
                    </div>
                </div>
            @endforeach
        @else
        <p>見つかりませんでした。</p>
        @endif

        </div>
    </body>
</html>
@endsection