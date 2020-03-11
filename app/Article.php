<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Article extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'title',
        'full_text',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }
}
