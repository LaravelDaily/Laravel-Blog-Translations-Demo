@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reply to a comment #{{ $comment->id }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('comments.storeReply', $comment->id) }}">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $comment->article_id }}">

                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">Comment</label>

                            <div class="col-md-6">
                                <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror" rows="8" required>{{ old('comment') }}</textarea>

                                @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Reply
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
