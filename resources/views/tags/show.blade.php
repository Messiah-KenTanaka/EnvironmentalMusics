@extends('app')

@section('title', config('app.name') . ' | ' . $tag->hashtag)

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        @include('ranking.tag')
        <h2 class="text-center my-3 main-ja-font-family tag-heading" data-en="Tag"><span>タグ</span></h2>
        <div class="card mt-3">
          <div class="card-body">
            <h2 class="h4 card-title m-0">{{ $tag->hashtag }}</h2>
            <div class="card-text text-right">
              {{ $tag->articles->count() }}件
            </div>
          </div>
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
  @include('bottomNav')
@endsection