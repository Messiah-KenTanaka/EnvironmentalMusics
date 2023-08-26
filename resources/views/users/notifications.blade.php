@extends('app')

@section('title', config('app.name') . ' | 通知')

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
            @include('sidemenu')
            <div class="col">
                <div class="ranking-title">
                    通知一覧
                </div>
                <a href="{{ route('notifications.markAllAsRead') }}" class="btn btn-primary">全て既読にする</a>
                @foreach($notifications as $notification)
                    @include('users.notification')
                @endforeach
                @if ($notifications->hasMorePages())
                    <p class="text-center mt-3 mb-5"><a href="{{ $notifications->nextPageUrl() }}">もっと読み込む</a></p>
                @endif

                @include('floatingButton')
            </div>
        </div>
    </div>
    @include('bottomNav')
@endsection
