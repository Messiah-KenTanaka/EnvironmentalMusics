@extends('app')

@section('title', config('app.name') . ' | ' . '検索')

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
        @include('sidemenu')
        <div class="col">
            @foreach($results as $key => $article)
                @include('articles.card')
            @endforeach
        </div>
        @include('sidemenuRight')
        </div>
    </div>
    @include('bottomNav')
@endsection
