<?php

namespace App\Http\Controllers;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Racket;
class CommentController extends Controller
{
    public function store(Racket  $racket, Request $request) {
      
      Comment::create([
        'body'=>$request->body,
        'user_id'=>$request->user()->id,
        'racket_id'=>$racket->id
        ]);
      return redirect('/rackets/'.$racket->id);
    }
    public function edit(Comment $comment)
  {
      return view('comments/edit')->with(['comment' => $comment]);
  }
  public function update(CommentRequest $request, Comment $comment)
  {
      $input_comment = $request['comment'];
      $input_comment += ['user_id' => $request->user()->id];
      $comment->fill($input_comment)->save();

      return redirect('/rackets/' . $comment->racket_id);
  }
  public function delete(Comment $comment)
  {
      $comment->delete();
      return redirect('/rackets/' . $comment->racket_id);
  }
}