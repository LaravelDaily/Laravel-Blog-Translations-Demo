<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReplyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'comment' => [
                'required', 'string'
            ],
            'article_id' => [
                'required', 'integer'
            ],
        ];
    }
}
