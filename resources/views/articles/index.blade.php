@extends('app')

@section('title', config('app.name') . ' | バス釣り専用SNS')

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
  @include('bottomNav')
@endsection
