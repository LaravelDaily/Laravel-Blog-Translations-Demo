<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\StoreCommentRequest;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(5);

        return view('home', compact('articles'));
    }

    public function article(Article $article)
    {
        $article->load('comments');

        return view('article', compact('article'));
    }

    public function storeComment(StoreCommentRequest $request, Article $article)
    {
        $article->comments()->create($request->validated());

        return redirect()->back()->with('status', 'New comment has been posted');
    }
}
