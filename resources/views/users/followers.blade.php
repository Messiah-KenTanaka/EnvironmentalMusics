@extends('app')

@section('title', $user->name . 'のフォロワー')

@section('content')
    @include('nav')
    <div class="container">
        @include('users.user')
        @include('users.tabs', ['hasArticles' => false, 'hasLikes' => false])
        @foreach($followers as $person)
            @include('users.person')
        @endforeach
        @if ($followers->hasMorePages())
            <p class="text-center my-3"><a href="{{ $followers->nextPageUrl() }}">もっと見る</a></p>
        @endif
    </div>
@endsection
