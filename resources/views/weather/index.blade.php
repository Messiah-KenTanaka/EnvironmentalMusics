@extends('app')

@section('title', config('app.name') . ' | 天気予報')

@section('content')
    @include('nav')
    <div class="container">
        <div class="row">
            @include('sidemenu')
            <div class="col">
                <div class="content-title">
                    {{ $cityName }} 天気予報
                </div>
                @include('weather.WeatherPref')
                @foreach ($weatherData as $date => $weatherItems)
                    @include('weather.card')
                @endforeach
                {{-- @include('floatingButton') --}}
            </div>
        </div>
    </div>
    @include('bottomNav')
@endsection
