@extends('app')

@section('title', config('app.name') . ' | ' . '検索')

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
        @include('sidemenu')
        <div class="col">
            <h2 class="text-center mt-5 my-3 main-ja-font-family search-heading" data-en="Search"><span>検索</span></h2>
            @include('search')
            @foreach($results as $key => $article)
                @include('articles.card')
            @endforeach
        </div>
        @include('sidemenuRight')
        </div>
    </div>
    @include('bottomNav')
@endsection
