@extends('app')

@section('title', config('app.name') . ' | 投稿詳細')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        @include('articles.card_detail')
        @include('articles.comment_form')
        <ul class="nav nav-tabs nav-justified mt-3">
          <li class="nav-item">
              <a class="nav-link text-muted">
                コメント
              </a>
          </li>
        </ul>
        @foreach($comments as $comment)
          @include('articles.comment')
        @endforeach
        @include('floatingButton')
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
