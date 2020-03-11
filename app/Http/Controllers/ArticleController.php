<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(StoreArticleRequest $request)
    {
        $article_data = [];
        if ($request->input('en_title')) {
            $article_data['en'] = [
                'title' => $request->input('en_title'),
                'full_text' => $request->input('en_full_text'),
            ];
        }
        if ($request->input('lt_title')) {
            $article_data['lt'] = [
                'title' => $request->input('lt_title'),
                'full_text' => $request->input('lt_full_text'),
            ];
        }

        Article::create($article_data);

        return redirect()->route('articles.index')->with('status', __('New article has been created'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article_data = [];
        if ($request->input('en_title')) {
            $article_data['en'] = [
                'title' => $request->input('en_title'),
                'full_text' => $request->input('en_full_text'),
            ];
        }
        if ($request->input('lt_title')) {
            $article_data['lt'] = [
                'title' => $request->input('lt_title'),
                'full_text' => $request->input('lt_full_text'),
            ];
        }

        $article->update($article_data);

        return redirect()->route('articles.index')->with('status', __('The article has been edited'));
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back()->with('status', __('The article has been deleted'));
    }
}
