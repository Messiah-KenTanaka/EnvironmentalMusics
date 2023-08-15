<template>
    <div class="folium-map z_index_1" id="map"></div>
</template>

<script>
import "leaflet/dist/leaflet.css";
import L from "leaflet";
import icon from "leaflet/dist/images/marker-icon.png";
import iconRetina from "leaflet/dist/images/marker-icon-2x.png";
import iconShadow from "leaflet/dist/images/marker-shadow.png";

export default {

    data() {
        return {
            places: []
        }
    },
    mounted() {
        axios.get('/api/place-maps').then(response => {
            this.places = response.data;
            this.initMap();
        });
    },
    methods: {
        initMap() {
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

            // APIから取得した場所のデータに基づいてマーカーを追加
            this.places.forEach(place => {
                let marker = L.marker([place.latitude, place.longitude]).addTo(map);
                let popupContent = `<div style="text-align:center;">
                                        <b>${place.name}</b><br>
                                        <hr>
                                    </div>
                                    `;

                // ３つの画像
                ['image1', 'image2', 'image3'].forEach(imageKey => {
                    if (place[imageKey]) {
                        popupContent += `<img src="${place[imageKey]}" width="100"><br>`;
                    }
                });

                popupContent += '<table style="width:100%;">';

                // 内容
                if (place.description && place.description.trim() !== '') {
                    popupContent += `<tr><td>内容:</td><td>${place.description}</td></tr>`;
                } else {
                    popupContent += `<tr><td>内容:</td><td>---</td></tr>`;
                }
                // 住所 
                if (place.address && place.address.trim() !== '') {
                    popupContent += `<tr><td>住所:</td><td>${place.address}</td></tr>`;
                } else {
                    popupContent += `<tr><td>住所:</td><td>---</td></tr>`;
                }
                // 電話番号
                if (place.phone && place.phone.trim() !== '') {
                    popupContent += `<tr><td>電話番号:</td><td>${place.phone}</td></tr>`;
                } else {
                    popupContent += `<tr><td>電話番号:</td><td>---</td></tr>`;
                }
                // 記事
                if (place.recommendation_url && place.recommendation_url.trim() !== '') {
                    popupContent += `<tr><td>記事:</td><td><a href="${place.recommendation_url}" target="_blank">${place.recommendation_url}</a></td></tr>`;
                } else {
                    popupContent += `<tr><td>記事:</td><td>---</td></tr>`;
                }

                popupContent += '</table>';

                popupContent += `<a href="https://www.google.com/maps?q=${place.latitude},${place.longitude}" target="_blank">Google Mapsで見る</a>`;

                marker.bindPopup(popupContent).openPopup();
            });
        }
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
