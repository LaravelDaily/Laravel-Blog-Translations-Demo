<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'en_title' => [
                'required_without:lt_title,lt_full_text', 'required_with:en_full_text'
            ],
            'en_full_text' => [
                'required_without:lt_title,lt_full_text', 'required_with:en_title'
            ],
            'lt_title' => [
                'required_without:en_title,en_full_text', 'required_with:lt_full_text'
            ],
            'lt_full_text' => [
                'required_without:en_title,en_full_text', 'required_with:lt_title'
            ],
        ];
    }
}
