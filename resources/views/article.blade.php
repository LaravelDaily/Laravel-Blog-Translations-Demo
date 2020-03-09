@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $article->title }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ $article->full_text }}</p>
                    <p>
                        <a href="{{ route('home') }}">Back to home</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
