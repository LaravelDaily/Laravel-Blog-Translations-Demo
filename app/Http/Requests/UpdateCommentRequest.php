<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
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
            ],
            'article_id' => [
                'sometimes', 'required'
            ],
        ];
    }
}
