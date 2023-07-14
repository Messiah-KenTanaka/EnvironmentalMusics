@extends('app')

@section('title', config('app.name') . ' | ' . $user->name . 'のいいねした投稿')

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
            @include('sidemenu')
            <div class="col">
                @include('users.user')
                @include('users.tabs', ['hasArticles' => false, 'hasLikes' => true])
                @foreach($articles as $article)
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
