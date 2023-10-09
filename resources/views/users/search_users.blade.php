@extends('app')

@section('title', config('app.name') . ' | ユーザー検索')

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
            @include('sidemenu')
            <div class="col col-xl-9 no-padding-margin">
                <div class="content-title">
                    全国の釣り人一覧
                </div>
                @include('search_user')
                @foreach ($users as $person)
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
