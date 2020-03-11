@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Create Article') }}
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link bg-aqua-active" href="#" id="english-link">EN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="lithuanian-link">LT</a>
                        </li>
                     </ul>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('articles.store') }}">
                        @csrf

                        <div id="english-form">
                            <div class="form-group row">
                                <label for="en_title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }} (EN)</label>

                                <div class="col-md-6">
                                    <input id="en_title" type="text" class="form-control @error('en_title') is-invalid @enderror" name="en_title" value="{{ old('en_title') }}">

                                    @error('en_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="en_full_text" class="col-md-4 col-form-label text-md-right">{{ __('Full Text') }} (EN)</label>

                                <div class="col-md-6">
                                    <textarea name="en_full_text" id="en_full_text" class="form-control @error('en_full_text') is-invalid @enderror" rows="8">{{ old('en_full_text') }}</textarea>

                                    @error('en_full_text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-none" id="lithuanian-form">
                            <div class="form-group row">
                                <label for="lt_title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }} (LT)</label>

                                <div class="col-md-6">
                                    <input id="lt_title" type="text" class="form-control @error('lt_title') is-invalid @enderror" name="lt_title" value="{{ old('lt_title') }}">

                                    @error('lt_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lt_full_text" class="col-md-4 col-form-label text-md-right">{{ __('Full Text') }} (LT)</label>

                                <div class="col-md-6">
                                    <textarea name="lt_full_text" id="lt_full_text" class="form-control @error('lt_full_text') is-invalid @enderror" rows="8">{{ old('lt_full_text') }}</textarea>

                                    @error('lt_full_text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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

@section('scripts')
<script>
$(function() {
    var $englishForm = $('#english-form');
    var $lithuanianForm = $('#lithuanian-form');
    var $englishLink = $('#english-link');
    var $lithuanianLink = $('#lithuanian-link');

    $englishLink.click(function() {
        $englishLink.toggleClass('bg-aqua-active');
        $englishForm.toggleClass('d-none');
        $lithuanianLink.toggleClass('bg-aqua-active');
        $lithuanianForm.toggleClass('d-none');
    });

    $lithuanianLink.click(function() {
        $englishLink.toggleClass('bg-aqua-active');
        $englishForm.toggleClass('d-none');
        $lithuanianLink.toggleClass('bg-aqua-active');
        $lithuanianForm.toggleClass('d-none');
    });
})
</script>
@endsection
