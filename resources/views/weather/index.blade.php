@extends('app')

@section('title', config('app.name') . ' | 天気予報')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      @include('sidemenu')
      <div class="col">
        @include('weather.WeatherPref')
        <h4 class="text-center my-3 main-ja-font-family"><span>{{ $cityName }} 天気予報</span></h4>
          @foreach ($weatherData as $date => $weatherItems)
            @include('weather.card')
          @endforeach
          @include('floatingButton')
      </div>
    </div>
  </div>
  @include('bottomNav')
@endsection
