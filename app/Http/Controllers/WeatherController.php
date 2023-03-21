<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function index() {
        // デフォルトは現在大阪固定
        $apiKey = env('OPENWEATHER_API_KEY');
        $data = $this->getWeatherData('Osaka', $apiKey);
        $cityName = $data['city']['name'];
        $weatherData = $this->extractWeatherData($data);
        $tags = Tag::getPopularTag();
        
        return view('weather.index',[
            'cityName' => $cityName,
            'weatherData' => $weatherData,
            'tags' => $tags,
        ]);
    }

    public function show(string $pref)
    {
        // 全国の天気予報
        $apiKey = env('OPENWEATHER_API_KEY');
        $data = $this->getWeatherData($pref, $apiKey);
        $cityName = $data['city']['name'];
        $weatherData = $this->extractWeatherData($data);
        $tags = Tag::getPopularTag();
        
        return view('weather.index',[
            'cityName' => $cityName,
            'weatherData' => $weatherData,
            'tags' => $tags,
        ]);
    }

    public function getWeatherData($cityName, $apiKey) {
        $url = "http://api.openweathermap.org/data/2.5/forecast?units=metric&lang=ja&q=$cityName&appid=$apiKey";
        $method = "GET";
        $client = new Client();
        $response = $client->request($method, $url);
        $data = $response->getBody();
        $data = json_decode($data, true);
        return $data;
    }

    public function extractWeatherData($data) {
        $weatherData = array();
        foreach ($data['list'] as $listItem) {
            $timestamp = strtotime($listItem['dt_txt']);
            $date = date('Y/m/d', $timestamp);
            $time = date('H:i', $timestamp);
            $weather = $listItem['weather'][0]['description'];
            $temperature = $listItem['main']['temp'];
            $humidity = $listItem['main']['humidity'];
            $windSpeed = $listItem['wind']['speed'];
            $weatherData[$date][] = array(
                'time' => $time,
                'weather' => $weather,
                'temperature' => $temperature,
                'humidity' => $humidity,
                'windSpeed' => $windSpeed,
            );
        }
        return $weatherData;
    }
    
}