<template>
    <div>
        <vue-slick-carousel
            :infinite="true"
            :slides-to-show="slidesToShow"
            :slides-to-scroll="1"
            :dots="true"
            :centerMode="false"
            :autoplay="true"
            :autoplaySpeed="3000"
            class="slider-container"
        >
            <div v-for="(image, index) in images" :key="index" class="image-container mt-3">
                <img :src="image" alt="画像" class="img-fluid" />
                <div class="text-overlay">
                    <div class="main-font-family">BASSER</div>
                    <span>最高の釣りがここにある</span>
                </div>
            </div>
        </vue-slick-carousel>
    </div>
</template>


<script>
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel.css";
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";

export default {
    components: {
        VueSlickCarousel,
    },
    data() {
        return {
            slidesToShow: 1, // 初期値
            images: [
                "/images/background/top_background_01.png",
                "/images/background/top_background_02.png",
                "/images/background/top_background_03.png",
                "/images/background/top_background_04.png",
                "/images/background/top_background_05.png",
                "/images/background/top_background_06.png",
                "/images/background/top_background_07.png",
            ],
        }
    },
};
</script>

<style scoped>
    img {
        border-radius: 0.25rem;
    }
</style>
