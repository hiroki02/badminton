@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ラケット管理</title>
    </head>
    <body>
        <h1>ラケット登録</h1>
        <form action="/rackets" method="RACKET">
            @csrf
            <div class="name">
                <h2>ラケット名</h2>
                <input type="text" name="racket[name]" placeholder="アークセイバー11プロ"/>
            </div>
            <div class="maker">
                <h2>メーカー名</h2>
                <input type="text" name="racket[maker]" placeholder="YONEX"/>
            </div>

            <div class="body">
                <h2>使ってみた感想</h2>
                <textarea name="racket[body]" placeholder="最高だった。"></textarea>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>
@endsection