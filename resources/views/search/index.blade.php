@extends('app')

@section('title', config('app.name') . ' | ' . '検索')

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
        @include('sidemenu')
        <div class="col">
            <div class="ranking-title">
                検索一覧
            </div>
            @include('search')
            @include('search.search_cards')
            @include('floatingButton')
        </div>
        </div>
    </div>
    @include('bottomNav')
@endsection
