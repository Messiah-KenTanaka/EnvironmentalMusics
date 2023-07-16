@extends('app')

@section('title', config('app.name') . ' | ' .$field . 'ランキング | サイズ')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        @include('ranking.pref')
        <h4 class="text-center my-3 main-ja-font-family"><span><span class="font-weight-bold">{{ $field }}</span>ランキング サイズ</span></h4>
        @include('ranking.field_tabs', ['hasSize' => true, 'hasWeight' => false])
        @foreach($ranking as $key => $article)
          @include('ranking.card', ['rank' => ++$key])
        @endforeach
        @include('floatingButton')
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection