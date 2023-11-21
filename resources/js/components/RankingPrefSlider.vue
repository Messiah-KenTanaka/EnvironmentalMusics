<template>
    <div>
        <vue-slick-carousel
            :infinite="true"
            :slides-to-show="slidesToShow"
            :slides-to-scroll="1"
            :dots="true"
            :centerMode="true"
            :centerPadding="'30px'"
            class="slider-container"
        >
            <div
                v-for="(article, index) in prefRanking"
                :key="index"
                class="slide-item"
            >
                <div class="card">
                    <a :href="'/articles/' + article.id">
                        <img
                            :src="article.image"
                            alt="画像"
                            class="slide-image"
                        />
                    </a>
                    <div class="p-2">
                        <div class="text-overlay-2">
                            <div v-if="index + 1 === 1">
                                <img
                                    :src="images.ranking1"
                                    width="50"
                                    height="50"
                                />
                            </div>
                            <div v-else-if="index + 1 === 2">
                                <img
                                    :src="images.ranking2"
                                    width="50"
                                    height="50"
                                />
                            </div>
                            <div v-else-if="index + 1 === 3">
                                <img
                                    :src="images.ranking3"
                                    width="50"
                                    height="50"
                                />
                            </div>
                            <div v-else>
                                <span class="ranking-4th-place-above">{{
                                    index + 1
                                }}</span>
                            </div>
                        </div>
                        <div class="d-flex flex-row m-1">
                            <div v-if="article.user.image">
                                <img
                                    :src="article.user.image"
                                    class="rounded-circle"
                                    width="30"
                                    height="30"
                                />
                            </div>
                            <div v-else>
                                <img
                                    :src="images.no_image"
                                    class="rounded-circle"
                                    width="30"
                                    height="30"
                                />
                            </div>
                            <div class="font-weight-bold px-2">
                                {{ article.user.nickname }}
                            </div>
                            <div v-if="article.user.achievementImage">
                                <img
                                    :src="article.user.achievementImage"
                                    width="25"
                                    height="25"
                                />
                            </div>
                        </div>
                        <div class="d-flex">
                            <div v-if="article.fish_size">
                                <div class="h6 py-0">
                                    <span class="font-black-ops-one pl-1">
                                        <i
                                            class="fa-solid fa-ruler-horizontal mr-1"
                                        ></i>
                                        {{ article.fish_size }}
                                    </span>
                                    cm
                                </div>
                            </div>
                            <div v-if="article.weight">
                                <div class="h6 py-0 pl-2">
                                    <span class="font-black-ops-one pl-1">
                                        <i
                                            class="fa-solid fa-weight-scale mr-1"
                                        ></i>
                                        {{ article.weight }}
                                    </span>
                                    g
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div
                                v-if="article.pref || article.bass_field"
                                class="text-muted"
                            >
                                <span v-if="article.pref">
                                    <small>
                                        {{ article.pref }}
                                    </small>
                                </span>
                                <span v-if="article.bass_field">
                                    <small> ({{ article.bass_field }}) </small>
                                </span>
                            </div>
                        </div>
                    </div>
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
    props: ["prefRanking"],
    data() {
        return {
            slidesToShow: 3, // 初期値
            images: {
                no_image: "/images/noimage02.jpg",
                ranking1: "/images/ranking_1.png",
                ranking2: "/images/ranking_2.png",
                ranking3: "/images/ranking_3.png",
            },
        };
    },
    mounted() {
        this.handleResize();
        window.addEventListener("resize", this.handleResize);
    },
    beforeDestroy() {
        window.removeEventListener("resize", this.handleResize);
    },
    methods: {
        handleResize() {
            if (window.innerWidth <= 768) {
                // 画面幅が768px以下の場合
                this.slidesToShow = 1;
            } else {
                this.slidesToShow = 3;
            }
        },
    },
};
</script>

<style scoped>
/* コンポーネントのスタイル部分に追加 */
.slider-container {
    width: 100%;
    margin-bottom: 70px;
}
.slide-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 10px;
}
.slide-image {
    max-width: 100%; /* 最大幅を100%に設定 */
    height: auto; /* 高さは自動に設定 */
    width: 350px; /* ここで幅を指定 */
    height: 200px; /* ここで高さを指定 */
    object-fit: cover; /* 画像が指定したサイズにフィットするように設定 */
    border-radius: 20px;
}
.card {
    border: none;
}
.fa-ruler-horizontal {
    color: #f91a01;
}
.fa-weight-scale {
    color: #41230e;
}
</style>
