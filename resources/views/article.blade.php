@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $article->title }}</div>

                <div class="card-body">
                    <p>{{ $article->full_text }}</p>
                    <hr>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @forelse ($article->comments as $comment)
                        <div class="row">
                            <div class="col">
                                <p class="font-weight-bold"><a href="mailto:{{ $comment->email }}">{{ $comment->name }}</a></p>
                                <p>{{ $comment->comment }}</p>
                            </div>
                        </div>
                        @if(!$loop->last)
                            <hr />
                        @endif
                    @empty
                        <div class="row">
                            <div class="col">
                                <p>{{ __('There are no comments') }}</p>
                            </div>
                        </div>
                    @endforelse
                    <hr>
                    <form action="{{ route('article.storeComment', $article->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="comment">{{ __('Comment') }}</label>
                            <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" rows="3" required></textarea>
                            @error('comment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input @error('subscribed') is-invalid @enderror" id="subscribed" name="subscribed" value="1">
                            <label class="fomr-check-label" for="subscribed">{{ __('Subscribed to replies') }}</label>
                            @error('subscribed')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </form>
                    <p class="mt-2">
                        <a href="{{ route('home') }}">{{ __('Back to home') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
