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
        <form action="/rackets" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image">
            <div class="name">
                <h2>ラケット名</h2>
                <input type="text" name="racket[name]" placeholder="アークセイバー11プロ" value="{{ old('racket.name') }}"/>
                <p class="name__error" style="color:red">{{ $errors->first('racket.name') }}</p>
            </div>
            <div class="type">
            <h2>Type</h2>
            <select name="racket[type_id]">
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
            <div class="weight">
            <h2>Weight</h2>
            <select name="racket[weight_id]">
                @foreach($weights as $weight)
                    <option value="{{ $weight->id }}">{{ $weight->name }}</option>
                @endforeach
            </select>
        </div>
            <div class="grip">
            <h2>Grip</h2>
            <select name="racket[grip_id]">
                @foreach($grips as $grip)
                    <option value="{{ $grip->id }}">{{ $grip->name }}</option>
                @endforeach
            </select>
        </div>
            <div class="maker">
                <h2>メーカー名</h2>
                <input type="text" name="racket[maker]" placeholder="YONEX" value="{{ old('racket.maker') }}"/>
                <p class="maker__error" style="color:red">{{ $errors->first('racket.maker') }}</p>
            </div>

            <div class="body">
                <h2>使ってみた感想</h2>
                <textarea name="racket[body]" placeholder="最高だった。">{{ old('racket.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('racket.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>
@endsection