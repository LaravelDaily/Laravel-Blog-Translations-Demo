@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Comment') }} {{ $comment->title }}</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="100">{{ __('Name') }}</th>
                            <td>{{ $comment->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Email') }}</th>
                            <td>{{ $comment->email }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Comment') }}</th>
                            <td>{{ $comment->comment }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Subscribed to replies') }}</th>
                            <td>{{ $comment->subscribed ? __('Yes') : __('No') }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Article') }}</th>
                            <td><a href="{{ route('articles.show', $comment->article->id) }}">{{ $comment->article->title }}</a></td>
                        </tr>
                    </table>

                    <p>
                        <a href="{{ route('comments.index') }}">{{ __('Back to list') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
