@extends('app')

@section('title', config('app.name') . ' | ' . $user->name . 'のブロックリスト')

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
                <div class="ranking-title text-danger ">
                    ブロックリスト
                </div>
                @foreach ($blockList as $person)
                    @include('users.block_person')
                @endforeach
                @if ($blockList->hasMorePages())
                    <p class="text-center my-3"><a href="{{ $blockList->nextPageUrl() }}">もっと見る</a></p>
                @endif
                {{-- @include('floatingButton') --}}
            </div>
        </div>
    </div>
    @include('bottomNav')
@endsection
