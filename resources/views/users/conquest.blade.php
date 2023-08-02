@extends('app')

@section('title', config('app.name') . ' | ' . $user->name . 'の全国釣果')

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
            @include('sidemenu')
            <div class="col">
                @include('users.user')
                @include('users.tabs', ['hasArticles' => false, 'hasLikes' => false, 'hasConquest' => true])
                <div class="mt-3">
                    <geo></geo>
                </div>
                @include('floatingButton')
            </div>
        </div>
    </div>
    @include('bottomNav')
@endsection
