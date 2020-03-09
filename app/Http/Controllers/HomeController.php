<?php

namespace App\Http\Controllers;

use App\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(5);

        return view('home', compact('articles'));
    }

    public function article(Article $article)
    {
        return view('article', compact('article'));
    }
}
