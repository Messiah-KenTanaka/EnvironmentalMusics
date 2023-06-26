@extends('app')

@section('title', config('app.name') . ' | ' .$pref . 'ランキング')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        @include('ranking.pref')
        <h4 class="text-center my-3 main-ja-font-family ranking-heading" data-en="Ranking"><span>{{ $pref }} ランキング</span></h4>
        @foreach($ranking as $key => $article)
          <div class="text-center my-4 main-ja-font-family h4">
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
        @include('floatingButton')
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
