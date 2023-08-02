<template>
  <div>
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
  mounted() {
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
        .attr("fill", "green");

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
</style>