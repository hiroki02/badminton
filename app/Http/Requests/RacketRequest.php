<?php

namespace App\Http\Requests;//場所を示している

use Illuminate\Foundation\Http\FormRequest;

class RacketRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'racket.name' => 'required|string|max:100',
            'racket.maker' => 'required|string|max:100',
            'racket.body' => 'required|string|max:4000',
        ];
    }
}
