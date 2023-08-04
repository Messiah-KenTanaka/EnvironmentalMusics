@extends('app')

@section('title', config('app.name') . ' | 全国ランキング | サイズ')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col-12 col-xl-9">
        <ranking-slider :ranking="{{ $ranking }}"></ranking-slider>
        @include('floatingButton')
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
