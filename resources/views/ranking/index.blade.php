@extends('app')

@section('title', 'ランキング')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        <h2 class="text-center my-4 main-ja-font-family">ランキング</h2>
        @foreach($ranking as $key => $article)
          @switch(++$key)
            @case(1)
              <h3 class="text-center my-4 main-ja-font-family first-gold">{{ $key }}位</h3>
                @break
            @case(2)
              <h3 class="text-center my-4 main-ja-font-family second-silver">{{ $key }}位</h3>
                @break
            @case(3)
              <h3 class="text-center my-4 main-ja-font-family third-copper">{{ $key }}位</h3>
                @break
            @default
              <h3 class="text-center my-4 main-ja-font-family">{{ $key }}位</h3>
          @endswitch
          @include('articles.card')
        @endforeach
      </div>
      <div class="float-button">
        <a class="button dusty-grass-gradient" href="{{ route('articles.create') }}">
          <i class="fas fa-feather"></i>
        </a>
      </div>
    </div>
  </div>
@endsection
