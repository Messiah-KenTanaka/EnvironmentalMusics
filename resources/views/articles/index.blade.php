@extends('app')

@section('title', config('app.name') . ' | バス釣り専用SNS')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        @include('success_text')
        @include('error_text')
        <div class="form-group">
          <div class="image-container mt-3 d-none d-xl-block">
            <img src="{{ asset('images/top_image01.jpg')}}" class="img-fluid">
            <div class="text-overlay">
              <h3 class="main-font-family">BASSER</h3>
              <span>最高の釣りがここにある</span>
            </div>
          </div>
          <a href="{{ route('articles.create') }}">
            <label></label>
            <div class="form-control" style="min-height: 20px;">今日はどうだった...？</div>
          </a>
        </div>
        @foreach($articles as $article)
          @include('articles.card')
        @endforeach
        @if ($articles->hasMorePages())
          <p class="text-center mt-3 mb-5"><a href="{{ $articles->nextPageUrl() }}">もっと読み込む</a></p>
        @endif
        @include('floatingButton')
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
