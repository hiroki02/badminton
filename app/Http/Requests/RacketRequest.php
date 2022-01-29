<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RacketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

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
