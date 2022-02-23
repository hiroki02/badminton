<?php

namespace App\Http\Controllers;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Racket;
class CommentController extends Controller
{
    public function store(Racket  $racket, CommentRequest $request) 
    {
      //inputはコメントの本文が格納される
      $input = $request['comment'];
      
      //ユーザーIDを付け足す
      $input += ['user_id' => $request->user()->id];
      
      //コメントモデルのインスタンスを作る。
      $comment = new \App\Comment($input);
      
      //ラケットモデルの中にコメントデータの保存
      $racket->comments()->save($comment);
      
      //ラケットのモデルの中にあるIDを基にラケットの詳細画面へ返す
      return redirect('/rackets/'.$racket->id);
    }
    public function edit(Comment $comment)
  {
      //コメントの編集画面に返す
      return view('comments/edit')->with(['comment' => $comment]);
  }
  public function update(CommentRequest $request, Comment $comment)
  {
      //input_commentは編集したコメントが格納される
      $input_comment = $request['comment'];
      
      //ユーザーIDを付け足す
      $input_comment += ['user_id' => $request->user()->id];
      
      //コメントモデルの中にinput_commentモデルのデータを保存
      $comment->fill($input_comment)->save();

      //コメントモデルの中のラケットのIDを基にラケットの詳細画面の表示
      return redirect('/rackets/' . $comment->racket_id);
  }
  public function delete(Comment $comment)
  {
      // コメントモデルの削除を行いラケットIDにあるラケットの詳細画面に返す
      $comment->delete();
      return redirect('/rackets/' . $comment->racket_id);
  }
}