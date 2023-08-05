@extends('app')

@section('title', config('app.name') . ' | 全国釣り場MAP')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="ranking-title">
          全国釣り場MAP
        </div>
        @include('map.card')
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
