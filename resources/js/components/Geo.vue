<template>
  <div>
    <div class="progress-container mb-3">
      <p>達成済みの都道府県数: {{ achievedCount }} / 47</p>
      <div class="progress">
        <div class="progress-bar"
          :style="{
            width: (achievedCount / 47) * 100 + '%',
            background: achievedCount === 47 ? 'linear-gradient(to right, violet, indigo, blue, green, yellow, orange, red)' : '#4caf50'
          }">
        </div>
      </div>
    </div>
    <div id="map" style="width: 100%;"></div>
    <div class="legend">
      <span class="color-box" style="background-color: green;"></span>
      <span>: 未達成</span>
      <span class="color-box" style="background-color: red;"></span>
      <span>: 達成</span>
    </div>
  </div>
</template>

<script>
import * as d3 from 'd3';

export default {
  props: {
    userId: Number
  },
  data() {
    return {
      achievedPrefectures: []
    };
  },
  computed: {
    achievedCount() {
      // 達成済みの都道府県数を返す
      return this.achievedPrefectures.length;
    },
  },
  async mounted() {
    // 達成済みの都道府県を取得
    try {
      const response = await axios.get(`/api/achieved-prefectures/${this.userId}`);
      this.achievedPrefectures = response.data;
    } catch (error) {
      console.error('Failed to fetch achieved prefectures:', error);
      console.log('取得エラー：' + error);
    }

    d3.json("/js/geojson_file.json").then((jp) => {
      const mapDiv = document.getElementById('map');
      const width = mapDiv.offsetWidth;
      const height = mapDiv.offsetHeight;

      const projection = d3.geoMercator().fitSize([width, height], jp);

      const path = d3.geoPath().projection(projection);

      const svg = d3.select("#map").append("svg")
        .attr("width", width)
        .attr("height", height);

      svg.selectAll("path")
        .data(jp.features)
        .enter()
        .append("path")
        .attr("d", path)
        .attr("fill", (d) => {
          // 達成済みの都道府県の場合、赤色にする
          if (this.achievedPrefectures.includes(d.properties.name)) {
            return "red";
          }
          return "green";
        });

      window.addEventListener("resize", function() {
        const newWidth = mapDiv.offsetWidth;
        const newHeight = mapDiv.offsetHeight;

        projection.fitSize([newWidth, newHeight], jp);

        svg
          .attr("width", newWidth)
          .attr("height", newHeight);

        svg.selectAll("path")
          .attr("d", path);
      });
    });
  },
};
</script>

<style>
  .legend {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
  }
  .color-box {
    display: inline-block;
    width: 20px;
    height: 20px;
    margin: 5px;
    border: 1px solid #000;
  }
  .progress-container {
    width: 100%;
    text-align: center;
  }
  .progress {
    background-color: #f3f3f3;
    height: 10px;
    width: 100%;
  }
  .progress-bar {
    height: 10px;
    transition: width 0.5s;
  }
</style>