@extends('app')

@section('title', config('app.name') . ' | ' . $user->name . 'のブロックリスト')

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
            @include('sidemenu')
            <div class="col">
                @include('users.user')
                @include('users.tabs', ['hasArticles' => false, 'hasLikes' => false])
                <h4 class="text-center main-ja-font-family text-danger mt-3">ブロックリスト</a></h4>
                @foreach($blockList as $person)
                    @include('users.block_person')
                @endforeach
                @if ($blockList->hasMorePages())
                    <p class="text-center my-3"><a href="{{ $blockList->nextPageUrl() }}">もっと見る</a></p>
                @endif
            </div>
        </div>
    </div>
    @include('bottomNav')
@endsection
