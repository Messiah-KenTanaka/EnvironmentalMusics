@extends('app')

@section('title', config('app.name') . ' | 全国ランキング | ウェイト')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        @include('ranking.pref')
        <h4 class="text-center my-3 main-ja-font-family"><span><span class="font-weight-bold">全国</span>ランキング ウェイト</span></h4>
        @include('ranking.tabs', ['hasSize' => false, 'hasWeight' => true])
        @foreach($ranking as $key => $article)
          @include('ranking.card', ['rank' => ++$key])
        @endforeach
        @include('floatingButton')
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
