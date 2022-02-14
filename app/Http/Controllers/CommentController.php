<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Racket;

class CommentController extends Controller
{
    public function store(Request $request, $racketId) {
      $this->validate($request, [
        'body' => 'required'
      ]);
      $comment = new Comment(['body' => $request->body]);
      $racket = Racket::findOrFail($racketId);
      $racket->comments()->save($comment);

      return redirect()
             ->action('RacketController@show', $racket->id);
    }
}