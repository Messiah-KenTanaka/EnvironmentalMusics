@extends('app')

@section('title', '投稿一覧')

@section('content')
  @include('nav')
  <div class="container">
    @foreach($articles as $article)
      @include('articles.card')
    @endforeach
    @if ($articles->hasMorePages())
      <p class="text-center my-3"><a href="{{ $articles->nextPageUrl() }}">もっと見る</a></p>
    @endif
  </div>
  <div class="float-button">
    <a class="button dusty-grass-gradient" href="{{ route('articles.create') }}">
      <i class="fas fa-feather text-danger"></i>
    </a>
  </div>
@endsection
