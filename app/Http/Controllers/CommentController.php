<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\StoreReplyRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Notifications\ReplyToCommentNotification;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('article')->get();

        return view('comments.index', compact('comments'));
    }

    public function create()
    {
        $articles = Article::all();

        return view('comments.create', compact('articles'));
    }

    public function store(StoreCommentRequest $request)
    {
        Comment::create($request->validated());

        return redirect()->route('comments.index')->with('status', 'New comment has been created');
    }

    public function show(Comment $comment)
    {
        $comment->load('article');

        return view('comments.show', compact('comment'));
    }

    public function edit(Comment $comment)
    {
        $comment->load('article');
        $articles = Article::all();

        return view('comments.edit', compact('comment', 'articles'));
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());

        return redirect()->route('comments.index')->with('status', 'The comment has been edited');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('status', 'The comment has been deleted');
    }

    public function reply(Comment $comment)
    {
        return view('comments.reply', compact('comment'));
    }

    public function storeReply(StoreReplyRequest $request, Comment $comment)
    {
        $user = auth()->user();

        $request->merge([
            'name'  => $user->name,
            'email' => $user->email,
        ]);

        $responseComment = Comment::create($request->only(['name', 'email', 'comment', 'article_id']));

        if($comment->subscribed)
        {
            Notification::route('mail', $comment->email)
                        ->notify(new ReplyToCommentNotification($responseComment));
        }

        return redirect()->route('comments.index')->with('status', 'The comment has been replied');
    }
}
