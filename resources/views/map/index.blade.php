@extends('app')

@section('title', config('app.name') . ' | 全国釣り場MAP')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      <div class="col">
        <h4 class="text-center my-3 main-ja-font-family map-heading" data-en="Map"><span>全国釣り場MAP</span></h4>
        @include('map.card')
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
