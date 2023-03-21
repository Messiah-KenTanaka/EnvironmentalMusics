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
                          <td>{{ $weatherItem['weather'] }}</td>
                          <td>{{ round($weatherItem['temperature'], 1) }}℃</td>
                          <td>{{ $weatherItem['humidity'] }}%</td>
                          <td>{{ $weatherItem['windSpeed'] }}m/s</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>
