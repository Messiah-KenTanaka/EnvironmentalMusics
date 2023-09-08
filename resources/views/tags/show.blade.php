@extends('app')

@section('title', config('app.name') . ' | ' . $tag->hashtag)

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col col-xl-9">
        <div class="ranking-title">
          最近のトレンド
        </div>
        <div class="card mt-3">
          <div class="card-body">
            <h2 class="h4 card-title font-weight-bold m-0">{{ $tag->hashtag }}</h2>
            {{-- 現状件数がずれている問題は構造的に解消できないためコメントアウト Twitterは件数を表示していないので現状これで対応  --}}
            {{-- <div class="card-text text-right">
              {{ $tag->articles->count() }}件
            </div> --}}
          </div>
        </div>
        @foreach($articles as $article)
          @include('articles.card')
        @endforeach
        {{-- @include('floatingButton') --}}
        @if ($articles->hasMorePages())
          <p class="text-center mt-3 mb-5"><a href="{{ $articles->nextPageUrl() }}">もっと読み込む</a></p>
        @endif
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection