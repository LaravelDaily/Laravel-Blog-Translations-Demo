<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required', 'string'
            ],
            'email' => [
                'required', 'string'
            ],
            'comment' => [
                'required', 'string'
            ],
            'subscribed' => [
                'boolean'
            ]
        ];
    }
}
