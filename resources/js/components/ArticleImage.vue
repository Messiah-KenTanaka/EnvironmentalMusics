<template>
  <div class="mt-2">
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
    }
  }
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
  max-height: 600px; /* この値は800pxより大きい画像の高さを800pxに制限します */
  width: auto;      /* 画像の元のアスペクト比を保持します */
  border-radius: 40px;
  object-fit: cover;
  display: block;  /* 画像が中央寄せになるのを防ぐため */
  margin: 0 auto;  /* 画像を中央に配置 */
  padding: 10px;
}

</style>
