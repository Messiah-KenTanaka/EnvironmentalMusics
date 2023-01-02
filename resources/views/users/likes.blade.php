@extends('app')

@section('title', $user->name . 'のいいねした投稿')

@section('content')
    @include('nav')
    <div class="container">
        @include('users.user')
        @include('users.tabs', ['hasArticles' => false, 'hasLikes' => true])
        @foreach($articles as $article)
            @include('articles.card')
        @endforeach
    </div>
@endsection
