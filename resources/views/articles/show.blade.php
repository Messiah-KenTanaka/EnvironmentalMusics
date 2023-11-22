@extends('app')

@section('title', config('app.name') . ' | 投稿詳細')

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
            @include('sidemenu')
            <div class="col col-xl-9">
                <div class="font-weight-bold text-center mt-3">
                    ツイート
                </div>
                @include('articles.card_detail')
                {{-- @include('articles.comment_form') --}}
                @if (Auth::id())
                    <comment-form-component :auth-id="{{ Auth::id() }}" :auth-image="'{{ Auth::user()->image }}'"
                        :article-id="{{ $article->id }}"></comment-form-component>
                @endif
                <div class="text-center card-bottom mt-3">
                    コメント
                </div>
                <comment-component :article_id="{{ $article->id }}"
                    :auth_id="{{ Auth::check() ? Auth::id() : 0 }}"></comment-component>
                {{-- @include('floatingButton') --}}
            </div>
        </div>
    </div>
    @include('bottomNav')
@endsection
