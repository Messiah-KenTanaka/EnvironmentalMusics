@extends('app')

@section('title', config('app.name') . ' | いいねしたユーザー')

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
            @include('sidemenu')
            <div class="col">
                <div class="ranking-title">
                    いいねしたユーザー
                </div>
                @foreach($users as $person)
                    @include('users.person')
                @endforeach
                @if ($users->hasMorePages())
                    <p class="text-center mt-3 mb-5"><a href="{{ $users->nextPageUrl() }}">もっと読み込む</a></p>
                @endif

                {{-- @include('floatingButton') --}}
            </div>
        </div>
    </div>
    @include('bottomNav')
@endsection
