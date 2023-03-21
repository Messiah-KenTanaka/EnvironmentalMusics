@extends('app')

@section('title', config('app.name') . '/' . $cityName . '・天気予報')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        @include('weather.WeatherPref')
        <h2 class="text-center my-3 main-ja-font-family weather-heading" data-en="Weather"><span>天気予報</span></h2>
        <h2 class="text-center my-3 main-ja-font-family">{{ $cityName }}</h2>
          @foreach ($weatherData as $date => $weatherItems)
            @include('weather.card')
          @endforeach
      </div>
      @include('sidemenuRight')
    </div>
  </div>
  @include('bottomNav')
@endsection
