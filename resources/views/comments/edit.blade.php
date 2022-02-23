@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <h2>
        　　ユーザー　{{Auth::user()->name}}
    </h2>
    <head>
        <meta charset="utf-8">
        <title>コメント</title>
    </head>
<body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/comments/{{ $comment->id }}" method="POST">
            @csrf
            @method('PUT')        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class='content__body'>
                            <h2>コメント</h2>
                                <input type='text' name='comment[body]' value="{{ $comment->body }}">
                        </div>
                                <input type="submit" class="btn btn-primary" value="保存">
                    </div>
        </form>
                    <div class="col-6">
                        <h2>
                            <div class="back"><a href="/rackets/{{$comment->racket_id}}">戻る</a></div>
                        </h2>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>
@endsection