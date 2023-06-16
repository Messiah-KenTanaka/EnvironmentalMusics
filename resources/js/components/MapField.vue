<template>
    <div class="folium-map" id="map"></div>
</template>

<script>
import "leaflet/dist/leaflet.css";
import L from "leaflet";
import icon from "leaflet/dist/images/marker-icon.png";
import iconRetina from "leaflet/dist/images/marker-icon-2x.png";
import iconShadow from "leaflet/dist/images/marker-shadow.png";

export default {
mounted() {
    var map = L.map("map").setView([35.65809922, 139.74135747], 5);
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
        'Map data &copy; <a href="https://openstreetmap.org">OpenStreetMap</a>',
    maxZoom: 18
    }).addTo(map);

    let DefaultIcon = L.icon({
    iconUrl: icon,
    iconRetinaUrl: iconRetina,
    shadowUrl: iconShadow,
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    tooltipAnchor: [16, -28],
    shadowSize: [41, 41]
    });
    L.Marker.prototype.options.icon = DefaultIcon;

    // 琵琶湖
    var biwako = L.marker([35.232355, 136.130267]).addTo(map)
        biwako.bindPopup("<b>琵琶湖</b><br>ここは琵琶湖です。").openPopup()

    // 河口湖
    var kawaguchiko = L.marker([35.515169, 138.755936]).addTo(map)
        kawaguchiko.bindPopup("<b>河口湖</b><br>ここは河口湖です。").openPopup()
}
};
</script>

<style>
#map {
    position: relative;
    width: 100%;
    height: 600px;
    left: 0%;
    top: 0%;
}
</style>
