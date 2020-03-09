@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Article {{ $article->title }}</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td width="100">Title</td>
                            <td>{{ $article->title }}</td>
                        </tr>
                        <tr>
                            <td>Full Text</td>
                            <td>{{ $article->full_text }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
