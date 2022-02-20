<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'comment.body' => 'required|string|max:4000',
        ];
    }
}