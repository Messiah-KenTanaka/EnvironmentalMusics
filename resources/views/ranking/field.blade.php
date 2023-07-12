@extends('app')

@section('title', config('app.name') . ' | ' .$field . 'ランキング')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        @include('ranking.pref')
        <h4 class="text-center my-3 main-ja-font-family"><span>{{ $field }} ランキング</span></h4>
        @foreach($ranking as $key => $article)
          <div class="text-center my-4 main-ja-font-family h4">
            @switch(++$key)
              @case(1)
              <img src="{{ asset('images/ranking_1.png')}}" class="rounded-circle mr-1" width="50" height="50">
                  @break
              @case(2)
              <img src="{{ asset('images/ranking_2.png')}}" class="rounded-circle mr-1" width="50" height="50">
                  @break
              @case(3)
              <img src="{{ asset('images/ranking_3.png')}}" class="rounded-circle mr-1" width="50" height="50">
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
