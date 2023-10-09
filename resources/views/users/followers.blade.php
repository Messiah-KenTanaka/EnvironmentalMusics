@extends('app')

@section('title', config('app.name') . ' | ' . $user->name . 'のフォロワー')

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
            @include('sidemenu')
            <div class="col col-xl-9 no-padding-margin">
                @include('users.user')
                @include('users.tabs', [
                    'hasArticles' => false,
                    'hasLikes' => false,
                    'hasConquest' => false,
                ])
                <div class="content-title">
                    フォロワー
                </div>
                @foreach ($followers as $person)
                    @include('users.person')
                @endforeach
                @if ($followers->hasMorePages())
                    <p class="text-center my-3"><a href="{{ $followers->nextPageUrl() }}">もっと見る</a></p>
                @endif
                {{-- @include('floatingButton') --}}
            </div>
        </div>
    </div>
    @include('bottomNav')
@endsection
