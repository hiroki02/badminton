@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    {{Auth::user()->name}}
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
            <div class='content__body'>
                <h2>コメント</h2>
                <input type='text' name='comment[body]' value="{{ $comment->body }}">
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>
</html>
@endsection