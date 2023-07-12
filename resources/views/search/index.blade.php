@extends('app')

@section('title', config('app.name') . ' | ' . '検索')

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
        @include('sidemenu')
        <div class="col">
            <h4 class="text-center my-4 main-ja-font-family"><span>検索</span></h4>
            @include('search')
            @foreach($articles as $key => $article)
                @include('articles.card')
            @endforeach
            @if ($articles->hasMorePages())
                <p class="text-center my-3"><a href="{{ $articles->nextPageUrl() }}">もっと見る</a></p>
            @endif
            @include('floatingButton')
        </div>
        </div>
    </div>
    @include('bottomNav')
@endsection
