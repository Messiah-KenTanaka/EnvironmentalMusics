@extends('app')

@section('title', config('app.name') . ' | ' . $user->name . 'のフォロー中')

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
            @include('sidemenu')
            <div class="col">
                @include('users.user')
                @include('users.tabs', ['hasArticles' => false, 'hasLikes' => false])
                @foreach($followings as $person)
                    @include('users.person')
                @endforeach
                @if ($followings->hasMorePages())
                    <p class="text-center my-3"><a href="{{ $followings->nextPageUrl() }}">もっと見る</a></p>
                @endif
            </div>
            @include('sidemenuRight')
        </div>
    </div>
    @include('bottomNav')
@endsection
