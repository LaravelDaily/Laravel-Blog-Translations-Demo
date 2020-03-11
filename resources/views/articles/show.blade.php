@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Article') }} {{ $article->title }}</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="100">{{ __('Title') }} (EN)</th>
                            <td>{{ optional($article->translate('en'))->title }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Full Text') }} (EN)</th>
                            <td>{{ optional($article->translate('en'))->full_text }}</td>
                        </tr>
                        <tr>
                            <th width="100">{{ __('Title') }} (LT)</th>
                            <td>{{ optional($article->translate('lt'))->title }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Full Text') }} (LT)</th>
                            <td>{{ optional($article->translate('lt'))->full_text }}</td>
                        </tr>
                    </table>

                    <p>
                        <a href="{{ route('articles.index') }}">{{ __('Back to list') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
