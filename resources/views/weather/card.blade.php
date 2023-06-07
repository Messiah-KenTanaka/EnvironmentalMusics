<div class="card mt-3">
  <div class="card-body">
      <h3 class="card-title">{{ $date }}</h3>
      <div class="table-responsive">
          <table class="table table-striped table-hover">
              <thead>
                  <tr>
                      <th>時間</th>
                      <th>天気</th>
                      <th>気温</th>
                      <th>湿度</th>
                      <th>風速</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($weatherItems as $weatherItem)
                      <tr>
                          <td>{{ $weatherItem['time'] }}</td>
                          <td>
                            @switch($weatherItem['weather'])
                              @case('晴天')
                                <img src="{{ asset('images/tennki-sunny.png')}}" class="rounded-circle mr-1" width="25" height="25">
                                @break
                              @case('曇りがち')
                              @case('雲')
                              @case('薄い雲')
                                <img src="{{ asset('images/tennki-cloudy.png')}}" class="rounded-circle mr-1" width="25" height="25">
                                @break
                              @case('厚い雲')
                                <img src="{{ asset('images/tennki-hot-cloudy.png')}}" class="rounded-circle mr-1" width="25" height="25">
                                @break
                              @case('小雨')
                                <img src="{{ asset('images/tennki-light-rain.png')}}" class="rounded-circle mr-1" width="25" height="25">
                                @break
                              @case('適度な雨')
                                <img src="{{ asset('images/tennki-rain.png')}}" class="rounded-circle mr-1" width="25" height="25">
                                @break
                              @case('強い雨')
                              @case('激しい雨')
                                <img src="{{ asset('images/tennki-heavy-rain.png')}}" class="rounded-circle mr-1" width="25" height="25">
                                @break
                              @case('小雪')
                                <img src="{{ asset('images/tennki-light-snow.png')}}" class="rounded-circle mr-1" width="25" height="25">
                                @break
                              @case('雪')
                                <img src="{{ asset('images/tennki-snow.png')}}" class="rounded-circle mr-1" width="25" height="25">
                                @break
                              @default
                                {{ $weatherItem['weather'] }}
                            @endswitch
                          </td>
                          <td>{{ round($weatherItem['temperature'], 1) }}℃</td>
                          <td>{{ $weatherItem['humidity'] }}%</td>
                          <td>{{ round($weatherItem['windSpeed'], 1) }}m/s</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>
