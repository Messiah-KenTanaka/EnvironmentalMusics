<template>
    <div>
        <!-- 全国のサイズランキング -->
        <div class="ranking-title">
            全国のランキング
        </div>
        <a href="/ranking" class="ranking-list-link">
            全国ランキング一覧＞
        </a>
        <vue-slick-carousel
            :infinite="true"
            :slides-to-show="slidesToShow"
            :slides-to-scroll="1"
            :dots="true"
            :centerMode="true"
            :centerPadding="'50px'"
            class="slider-container"
        >
            <div v-for="(article, index) in ranking" :key="index" class="slide-item">
                <div class="card">
                    <img :src="article.image" alt="画像" class="slide-image" />
                    <div class="text-overlay-2">
                        <template v-if="index + 1 === 1">
                            <img :src="images.ranking1" width="50" height="50">
                        </template>
                        <template v-else-if="index + 1 === 2">
                            <img :src="images.ranking2" width="50" height="50">
                        </template>
                        <template v-else-if="index + 1 === 3">
                            <img :src="images.ranking3" width="50" height="50">
                        </template>
                        <template v-else>
                            <span class="ranking-4th-place-above">{{ index + 1 }}</span>
                        </template>
                    </div>
                    <div class="p-2">
                        <div class="d-flex">
                            <div v-if="article.fish_size">
                                <div class="h6 py-0">
                                    <span class="pl-1">
                                        <i class="fa-solid fa-ruler-horizontal"></i>
                                        {{ article.fish_size }}
                                    </span>
                                    cm
                                </div>
                            </div>
                            <div v-if="article.weight">
                                <div class="h6 py-0 pl-3">
                                    <span class="pl-1">
                                        <i class="fa-solid fa-weight-scale"></i>
                                        {{ article.weight }}
                                    </span>
                                    g
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div v-if="article.pref || article.bass_field" class="text-muted">
                                <span v-if="article.pref">
                                    <small class="p-2">
                                        {{ article.pref }}
                                    </small>
                                </span>
                                <span v-if="article.bass_field">
                                    / 
                                    <small class="p-2">
                                        {{ article.bass_field }}
                                    </small>
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
    props: ["ranking"],
    data() {
        return {
            slidesToShow: 3, // 初期値
            images: {
                ranking1: "/images/ranking_1.png",
                ranking2: "/images/ranking_2.png",
                ranking3: "/images/ranking_3.png",
            },
        }
    },
    mounted() {
        this.handleResize();
        window.addEventListener('resize', this.handleResize);
    },
    beforeDestroy() {
        window.removeEventListener('resize', this.handleResize);
    },
    methods: {
        handleResize() {
            if (window.innerWidth <= 768) { // 画面幅が768px以下の場合
                this.slidesToShow = 1;
            } else {
                this.slidesToShow = 3;
            }
        }
    }
};
</script>

<style scoped>
/* コンポーネントのスタイル部分に追加 */
.slider-container {
    width: 100%; 
}
.slide-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 15px;
}
.slide-image {
  max-width: 100%; /* 最大幅を100%に設定 */
  height: auto; /* 高さは自動に設定 */
  width: 350px; /* ここで幅を指定 */
  height: 200px; /* ここで高さを指定 */
  object-fit: cover; /* 画像が指定したサイズにフィットするように設定 */
}
.ranking-title {
    font-size: 24px;
    font-weight: 600; /* 太さを少し減らす */
    text-align: center;
    margin: 20px auto; /* 余白の調整 */
    padding: 10px;
    background-color: rgba(0, 0, 0, 0.9); /* 半透明の黒に */
    color: #ffffff;
    max-width: 80%;
    border-radius: 10px; /* 角を丸く */
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* 影の追加 */
    letter-spacing: 1px; /* 文字間隔の調整 */
    line-height: 1.5; /* 行間の調整 */
}
.ranking-list-link {
    text-align: right; /* 右寄せにする */
    display: block;   /* ブロックレベル要素にする */
}
.ranking-list-link:hover {
    color: #0056b3; /* ホバー時の色 */
}
</style>
