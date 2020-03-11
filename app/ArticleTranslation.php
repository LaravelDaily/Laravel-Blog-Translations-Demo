<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleTranslation extends Model
{
    protected $fillable = [
        'title',
        'full_text',
    ];

    public $timestamps = false;
}
