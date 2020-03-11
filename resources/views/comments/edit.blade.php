@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Comment') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $comment->name) }}" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $comment->email) }}" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>

                            <div class="col-md-6">
                                <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror" rows="8" required>{{ old('comment', $comment->comment) }}</textarea>

                                @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subscribed" class="col-md-4 col-form-label text-md-right">{{ __('Subscribed to replies') }}</label>

                            <div class="col-md-6 mt-2">
                                <input type="hidden" name="subscribed" value="0">
                                <input type="checkbox" class="@error('subscribed') is-invalid @enderror" id="subscribed" name="subscribed" value="1" {{ old('subscribed', $comment->subscribed) ? 'checked' : '' }}>

                                @error('subscribed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="article" class="col-md-4 col-form-label text-md-right">{{ __('Article') }}</label>

                            <div class="col-md-6">
                                <select id="article" class="form-control @error('article_id') is-invalid @enderror" name="article_id" required>
                                    @foreach($articles as $article)
                                        <option value="{{ $article->id }}" {{ old('article_id', $comment->article_id) == $article->id ? 'selected' : '' }}>{{ $article->title }}</option>
                                    @endforeach
                                </select>

                                @error('article_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
