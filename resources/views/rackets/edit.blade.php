@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    {{Auth::user()->name}}
    <head>
        <meta charset="utf-8">
        <title>ラケット管理</title>
    </head>
<body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/rackets/{{ $racket->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="image">画像を変更したい場合はファイルを選択してください</label>
            <input type="file" name="image" value="{{$racket->image_path}}">
            <div class='content__title'>
                <h2>ラケット名</h2>
                <input type='text' name='racket[name]' value="{{ $racket->name }}">
            </div>
            <div class='content__type'>
                <h2>Type</h2>
                <select name="racket[type_id]">
                @foreach($types as $type)
                    @if($type->id === $racket->type_id)
                        <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                    @else
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endif
                @endforeach
            </select>
            </div>

            <div class='content__weight'>
                <h2>Weight</h2>
                <select name="racket[weight_id]">
                @foreach($weights as $weight)
                    @if($weight->id === $racket->weight_id)
                        <option value="{{ $weight->id }}" selected>{{ $weight->name }}</option>
                    @else
                        <option value="{{ $weight->id }}">{{ $weight->name }}</option>
                    @endif
                @endforeach
            </select>
            </div>
            <div class='content__grip'>
                <h2>Grip</h2>
                <select name="racket[grip_id]">
                @foreach($grips as $grip)
                    @if($grip->id === $racket->grip_id)
                        <option value="{{ $grip->id }}" selected>{{ $grip->name }}</option>
                    @else
                        <option value="{{ $grip->id }}">{{ $grip->name }}</option>
                    @endif
                @endforeach
            </select>
            </div>
            <div class='content__maker'>
                <h2>メーカー</h2>
                <input type='text' name='racket[maker]' value="{{ $racket->maker }}">
            </div>
            <div class='content__body'>
                <h2>使ってみた感想</h2>
                <input type='text' name='racket[body]' value="{{ $racket->body }}">
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>
</html>
@endsection