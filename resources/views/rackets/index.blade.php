@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <h2>
        　　ユーザー　{{Auth::user()->name}}
    </h2>
    <head>
        <meta charset="utf-8">
        <title>ラケット管理アプリ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ラケット管理アプリ</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h2>検索</h2>
                    <form action="{{url('/rackets')}}" method="GET">
                    <p><input type="text" name="keyword" value="{{ old('keyword', $keyword ?? '') }}"></p>
                    <p><input type="submit" class="btn btn-primary" value="検索"></p>
                </form>
            </div>
                <div class="col-6">
                    <h2>ラケット登録</h2>
                        <div class='rackets'>
                            <a class="btn btn-primary" href='/rackets/create' role="button">ラケット登録</a>
                        </div>
                    </div>
            <!--検索したいキーワードが入っているラケットモデルの数を数える処理。-->
            @if($rackets->count())
            <div class="container-fluid">
            <div class="row">
            <!--foreachでラケットモデルのテーブルのデータを表示させる-->
            @foreach ($rackets as $racket)
                <div class='racket col-6'>
                    <h2 class='name'>
                        <a href="/rackets/{{ $racket->id }}">{{ $racket->name }}</a>
                    </h2>

                    <!--ラケットモデルの中にimage_pathのデータがある時に処理を行う-->
                    @if ($racket->image_path)
                    <img src="{{ $racket->image_path }}" class="img-thumbnail" class="img-fluid">
                    @endif
                    <!--ラケットのデータを縞模様上に表示させる-->
                    <table class="table table-striped">
                    <p><tr><td>登録者名　</td><td>{{ $racket->user->name }}</td></tr></p>
                    <p class='type_id'><tr><td>ラケットのタイプ　</td><td>{{ $racket->type->name}}</td></tr></p>
                    <p class='weight_id'><tr><td>重量　</td><td>{{ $racket->weight->name }}</td></tr></p>
                    <p class='grip_id'><tr><td>グリップ　</td><td>{{ $racket->grip->name }}</td></tr></p>
                    <p class='maker'><tr><td>メーカー　</td><td>{{ $racket->maker }}</td></tr></p>
                    </table>
                </div>
            @endforeach
            </div>
            </div>
                <div class='paginate'>
                    <!--ページネーションを連携させる-->
                    {{ $rackets->appends(['keyword' => $keyword ?? ''])->links()}}
                </div>
        @else
            <p>見つかりませんでした。</p>
        @endif
        </div>
    </body>
</html>
@endsection