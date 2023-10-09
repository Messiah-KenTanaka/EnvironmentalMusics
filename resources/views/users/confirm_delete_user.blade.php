@extends('app')

@section('title', config('app.name') . ' | ユーザー削除確認')

@include('nav')

@section('content')
    <div class="container">
        <div class="row">
            @include('sidemenu')
            <div class="col mt-4">
                @if (Auth::id() == $user->id)
                    <div class="content-title text-danger">
                        ユーザー削除確認
                    </div>
                    <div class="card mt-3">
                        <div class="card-body pt-0">
                            @include('error_card_list')
                            <div class="card-text">
                                @include('users.delete_form')
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('bottomNav')
@endsection
