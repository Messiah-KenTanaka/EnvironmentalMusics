@extends('app')

@section('title', '投稿一覧')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        <div class="form-group">
          <a href="{{ route('articles.create') }}">
            <label></label>
            <textarea class="form-control" rows="1" placeholder="今日はどうだった？"></textarea>
          </a>
        </div>
        @foreach($articles as $article)
          @include('articles.card')
        @endforeach
        @if ($articles->hasMorePages())
          <p class="text-center my-3"><a href="{{ $articles->nextPageUrl() }}">もっと見る</a></p>
        @endif
      </div>
      @include('sidemenuRight')
    </div>
  </div>
  <div class="float-button">
    <a class="button dusty-grass-gradient" href="{{ route('articles.create') }}">
      <i class="fas fa-feather"></i>
    </a>
  </div>
@endsection
