@extends('app')

@section('title', 'ランキング')

@section('content')
  @include('nav')
  <div class="container">
    <h2 class="text-center my-4 main-ja-font-family"><i class="fas fa-crown text-warning"></i> ランキング <i class="fas fa-crown text-warning"></i></h2>
    @foreach($ranking as $key => $article)
      <h3 class="text-center my-4 main-ja-font-family">{{ ++$key }}位</h3>
      @include('articles.card')
    @endforeach
  </div>
  <div class="float-button">
    <a class="button dusty-grass-gradient" href="{{ route('articles.create') }}">
      <i class="fas fa-feather text-danger"></i>
    </a>
  </div>
@endsection
