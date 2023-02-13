@extends('app')

@section('title', config('app.name') . '/投稿詳細')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        @include('articles.card')
      </div>
      @include('sidemenuRight')
    </div>
  </div>
  @include('bottomNav')
@endsection
