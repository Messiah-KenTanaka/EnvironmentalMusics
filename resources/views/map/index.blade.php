@extends('app')

@section('title', config('app.name') . ' | 釣り場MAP')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      <div class="col">
        <h2 class="text-center my-3 main-ja-font-family ranking-heading" data-en="Map"><span>釣り場MAP</span></h2>
        @include('map.card')
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
