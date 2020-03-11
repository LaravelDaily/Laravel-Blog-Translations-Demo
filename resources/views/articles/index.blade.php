@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Articles') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">
                        {{ __('Create new article') }}
                    </a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Full Text') }}</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ Str::limit($article->full_text, 150) }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary mb-2" href="{{ route('articles.show', $article->id) }}">
                                            {{ __('View') }}
                                        </a>

                                        <a class="btn btn-sm btn-info mb-2" href="{{ route('articles.edit', $article->id) }}">
                                            {{ __('Edit') }}
                                        </a>

                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline-block;">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-sm btn-danger mb-2" value="{{ __('Delete') }}">
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
