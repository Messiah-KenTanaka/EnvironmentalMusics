@extends('app')

@section('title', config('app.name') . ' | ' . $user->name . 'のフォロワー')

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
            @include('sidemenu')
            <div class="col">
                @include('users.user')
                @include('users.tabs', ['hasArticles' => false, 'hasLikes' => false])
                <h4 class="text-center main-ja-font-family mt-3">フォロワー</a></h4>
                @foreach($followers as $person)
                    @include('users.person')
                @endforeach
                @if ($followers->hasMorePages())
                    <p class="text-center my-3"><a href="{{ $followers->nextPageUrl() }}">もっと見る</a></p>
                @endif
            </div>
        </div>
    </div>
    @include('bottomNav')
@endsection
