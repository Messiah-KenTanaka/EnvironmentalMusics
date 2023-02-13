@extends('app')

@section('title', config('app.name') . '/全国ランキング')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        @include('ranking.pref')
        <h2 class="text-center my-3 main-ja-font-family ranking-heading" data-en="Ranking"><span>ランキング</span></h2>
        <h2 class="text-center my-3 main-ja-font-family">全国</h2>
        @foreach($ranking as $key => $article)
          <div class="text-center my-4 main-ja-font-family h2">
            @switch(++$key)
              @case(1)
                <span class="ranking-first">{{ $key }}位</span>
                  @break
              @case(2)
                <span class="ranking-second">{{ $key }}位</span>
                  @break
              @case(3)
                <span class="ranking-third">{{ $key }}位</span>
                  @break
              @default
                <span class="">{{ $key }}位</span>
            @endswitch
          </div>
          @include('articles.card')
        @endforeach
      </div>
      @include('sidemenuRight')
    </div>
  </div>
  @include('bottomNav')
@endsection
