@extends('app')

@section('title', config('app.name') . ' | ' . '検索：' . $keyword)

@section('content')
    @include('nav')
    <div class="container overflow-x-hidden">
        <div class="row">
        @include('sidemenu')
        <div class="col col-xl-9">
            @include('search')
            <div class="card mt-3">
                <div class="card-body">
                    <h2 class="h4 card-title font-weight-bold m-0">
                        {{ $keyword }}
                    </h2>
                    <div class="card-text text-right">
                        {{ $articles->count() }}件
                    </div>
                </div>
            </div>
            @foreach($articles as $key => $article)
                @include('articles.card')
            @endforeach
            @if ($articles->hasMorePages())
                <p class="text-center mt-3 mb-5"><a href="{{ $articles->nextPageUrl() }}">もっと読み込む</a></p>
            @endif
            @include('floatingButton')
        </div>
        </div>
    </div>
    @include('bottomNav')
@endsection
