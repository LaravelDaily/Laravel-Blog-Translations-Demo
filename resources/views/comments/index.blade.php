@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Comments</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('comments.create') }}" class="btn btn-primary mb-3">
                        Create new comment
                    </a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Comment</th>
                                <th>Subscribed to replies</th>
                                <th>Article</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $comment->name }}</td>
                                    <td>{{ $comment->email }}</td>
                                    <td>{{ Str::limit($comment->comment, 100) }}</td>
                                    <td>{{ $comment->subscribed ? 'Yes' : 'No' }}</td>
                                    <td><a href="{{ route('articles.show', $comment->article->id) }}">{{ $comment->article->title }}</a></td>
                                    <td>
                                        <a class="btn btn-sm btn-success mb-2" href="{{ route('comments.reply', $comment->id) }}">
                                            Reply
                                        </a>

                                        <a class="btn btn-sm btn-primary mb-2" href="{{ route('comments.show', $comment->id) }}">
                                            View
                                        </a>

                                        <a class="btn btn-sm btn-info mb-2" href="{{ route('comments.edit', $comment->id) }}">
                                            Edit
                                        </a>

                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline-block;">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-sm btn-danger mb-2" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
