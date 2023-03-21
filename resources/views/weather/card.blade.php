<div class="card mt-3">
  <div class="card-body">
    <h3>{{ $date }}</h3>
    <table>
        <tr>
            <th>時間</th>
            <th>天気</th>
            <th>気温</th>
            <th>湿度</th>
            <th>風速</th>
        </tr>
        @foreach ($weatherItems as $weatherItem)
            <tr>
                <td>{{ $weatherItem['time'] }}</td>
                <td>{{ $weatherItem['weather'] }}</td>
                <td>{{ $weatherItem['temperature'] }}℃</td>
                <td>{{ $weatherItem['humidity'] }}%</td>
                <td>{{ $weatherItem['windSpeed'] }}m/s</td>
            </tr>
        @endforeach
    </table>
  </div>
</div>