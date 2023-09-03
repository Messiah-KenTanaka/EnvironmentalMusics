@extends('app')

@section('title', config('app.name') . ' | 投稿詳細')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col col-xl-9">
        <div class="font-weight-bold text-center mt-3">
          ポスト
        </div>
        @include('articles.card_detail')
        @include('articles.comment_form')
        <div class="text-center border-bottom mt-3">
          コメント
        </div>
        @if (isset($article->comment_count) && $article->comment_count > 0)
          <comment-component :article_id="{{ $article->id }}" :auth_id="{{ Auth::check() ? Auth::id() : 0 }}"></comment-component>
        @endif
        {{--  @include('floatingButton')  --}}
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
