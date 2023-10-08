@extends('app')

@section('title', config('app.name') . ' | ' . $user->name . 'の全国制覇MAP')

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
                    'hasConquest' => true,
                ])
                <div class="mt-3">
                    <geo :user-id="{{ $user->id }}"></geo>
                </div>
                {{-- @include('floatingButton') --}}
            </div>
        </div>
    </div>
    @include('bottomNav')
@endsection
