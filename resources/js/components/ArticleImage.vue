<template>
  <div>
    <!-- 画像が1枚だけの場合 -->
    <div v-if="imageCount === 1">
      <a :href="'/articles/' + article.id">
        <img :src="article.image" :alt="'画像 '" class="img-fluid border-image p-3" />
      </a>
    </div>
    <!-- 画像が2枚以上の場合slick機能を使用 -->
    <div v-else>
      <vue-slick-carousel
          :infinite="true"
          :slides-to-show="slidesToShow"
          :slides-to-scroll="1"
          :dots="true"
          :centerMode="true"
          :centerPadding="'10px'"
          class="slider-container"
      >
        <a v-for="(image, index) in imageArray" :key="index" :href="'/articles/' + article.id">
          <img :src="image" :alt="'画像 ' + index" class="img-fluid slide-image" />
        </a>
      </vue-slick-carousel>
    </div>
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
  props: ["article"],
  data() {
      return {
          slidesToShow: 1, // 初期値
      }
  },
  computed: {
    imageArray() {
        return [this.article.image, this.article.image2, this.article.image3].filter(Boolean);
    },
    imageCount() {
        return this.imageArray.length;
    }
  }
};
</script>

<style scoped>
/* コンポーネントのスタイル部分に追加 */
.slider-container {
  width: 100%;
  margin-bottom: 2rem;
}
.slide-image {
  height: 600px;
  width: auto;
  border-radius: 40px;
  object-fit: cover;
  display: block;
  margin: 0 auto;
  padding: 10px;
}
@media (max-width: 576px) {
	.slide-image {
    height: 350px;
    min-width: 300px;
	}
}

</style>
