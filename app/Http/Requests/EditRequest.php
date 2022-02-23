<?php

namespace App\Http\Requests;//場所を示している

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'racket.type_id' => 'required',
            'racket.weight_id' => 'required',
            'racket.grip_id' => 'required',
            'racket.maker' => 'required|string|max:100',
            'racket.body' => 'required|string|max:4000',
        ];
    }
}
