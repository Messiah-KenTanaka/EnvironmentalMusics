@extends('app')

@section('title', config('app.name') . ' | ' . '検索：' . $keyword)

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
        @include('sidemenu')
        <div class="col">
            <h2 class="text-center mt-5 my-3 main-ja-font-family search-heading" data-en="Search"><span>検索</span></h2>
            <div class="card mt-3">
                <div class="card-body">
                    <h2 class="h4 card-title m-0">
                        {{ $keyword }}
                    </h2>
                    <div class="card-text text-right">
                        {{ $results->count() }}件
                    </div>
                </div>
            </div>
            @foreach($results as $key => $article)
                @include('articles.card')
            @endforeach
        </div>
        @include('sidemenuRight')
        </div>
    </div>
    @include('bottomNav')
@endsection
