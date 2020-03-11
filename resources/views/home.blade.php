@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Hello!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($articles as $article)
                        <div class="mb-4">
                            <a href="{{ route('article', [app()->getLocale(), $article->id]) }}">
                                <h3>{{ $article->title }}</h3>
                            </a>
                            <p>{{ Str::limit($article->full_text, 200) }}</p>
                        </div>
                    @endforeach

                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
