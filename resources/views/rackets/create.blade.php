@extends('layouts.app')

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <h2>
        　　ユーザー　{{Auth::user()->name}}
    </h2>
    <head>
        <meta charset="utf-8">
        <title>ラケット管理</title>
    </head>
    <body>
        <h1>ラケット登録</h1>
        <form action="/rackets" method="post" enctype="multipart/form-data">
            @csrf
            <!--グリッドを用い２列にする-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <!--画像の挿入-->
                        <input type="file" name="image">
                        <!--バリデーションの表示-->
                            <p class="image__error" style="color:red">{{ $errors->first('image') }}</p>
                    </div>
                    <div class="col-6">
                        <div class="name">
                            <h2>ラケット名</h2>
                            <!--ラケットの名前をテキストで入れる-->
                            <input type="text" name="racket[name]" placeholder="アークセイバー11プロ"/>
                            <!--バリデーションの表示-->
                            <p class="name__error" style="color:red">{{ $errors->first('racket.name') }}</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="type">
                            <h2>Type</h2>
                            <!--foreachでタイプのテーブルのデータを表示させ選択させる-->
                            <select name="racket[type_id]">
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="weight">
                            <h2>Weight</h2>
                            <!--foreachで重さのテーブルのデータを表示させ選択させる-->
                                <select name="racket[weight_id]">
                                    @foreach($weights as $weight)
                                        <option value="{{ $weight->id }}">{{ $weight->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="grip">
                            <h2>Grip</h2>
                            <!--foreachでgripテーブルのデータを表示させ選択させる-->
                                <select name="racket[grip_id]">
                                    @foreach($grips as $grip)
                                        <option value="{{ $grip->id }}">{{ $grip->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="maker">
                            <h2>メーカー名</h2>
                            <!--メーカーの名前をテキストで入れる-->
                                <input type="text" name="racket[maker]" placeholder="YONEX"/>
                                <!--バリデーションの表示-->
                                    <p class="maker__error" style="color:red">{{ $errors->first('racket.maker') }}</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="body">
                            <h2>使ってみた感想</h2>
                            <!--感想をテキストで入れる-->
                                <textarea name="racket[body]" placeholder="最高だった。"></textarea>
                                <!--バリデーションの表示-->
                                    <p class="body__error" style="color:red">{{ $errors->first('racket.body') }}</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <input type="submit" class="btn btn-primary" value="保存"/>
                    </div>
        </form>
            <h2><div class="back">
                <!--ラケット一覧画面に戻る-->
                    <a href="/">戻る</a>
                </div>
            </h2>
    </body>
</html>
@endsection