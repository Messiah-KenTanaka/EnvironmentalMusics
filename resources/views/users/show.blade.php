@extends('app')

@section('title', config('app.name') . ' | ' . $user->name)

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
            @include('sidemenu')
            <div class="col col-xl-9">
                @include('users.user')
                @include('users.tabs', ['hasArticles' => true, 'hasLikes' => false, 'hasConquest' => false])
                @foreach($articles as $article)
                    @include('articles.card')
                @endforeach
                @if ($articles->hasMorePages())
                    <p class="text-center mt-3 mb-5"><a href="{{ $articles->nextPageUrl() }}">もっと読み込む</a></p>
                @endif
                {{-- @include('floatingButton') --}}
            </div>
        </div>
    </div>
    @include('bottomNav')
@endsection
