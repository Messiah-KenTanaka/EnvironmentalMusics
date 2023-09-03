@extends('app')

@section('title', config('app.name') . ' | 投稿詳細')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col col-xl-9">
        @include('articles.card_detail')
        @include('articles.comment_form')
        @if (isset($article->comment_count) && $article->comment_count > 0)
          <comment-component :article_id="{{ $article->id }}" :auth_id="{{ Auth::id() }}"></comment-component>
        @endif
        @include('floatingButton')
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
