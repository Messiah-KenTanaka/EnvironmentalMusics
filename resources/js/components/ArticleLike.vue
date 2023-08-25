<template>
  <div>
    <transition name="like-animation">
      <i v-if="gotToLike" class="fas fa-heart animated-like"></i>
    </transition>
    <button
      type="button"
      class="btn m-0 p-1 shadow-none"
    >
      <i class="fas fa-heart mr-1"
        :class="{'red-text':this.isLikedBy, '':this.gotToLike}"
        @click="clickLike"
      />
    </button>
    {{ countLikes }}
  </div>
</template>

<script>
  export default {
    props: {
      initialIsLikedBy: {
        type: Boolean,
        default: false,
      },
      initialCountLikes: {
        type: Number,
        default: 0,
      },
      authorized: {
        type: Boolean,
        default: false,
      },
      endpoint: {
        type: String,
      },
    },
    data() {
      return {
        isLikedBy: this.initialIsLikedBy,
        countLikes: this.initialCountLikes,
        gotToLike: false,
      }
    },
    methods: {
      clickLike() {
        if (!this.authorized) {
          alert('いいね機能はログイン中のみ使用できます')
          return
        }

        this.isLikedBy
          ? this.unlike()
          : this.like()
      },
      async like() {
        // すぐにUIを更新
        this.isLikedBy = true
        this.countLikes++
        this.gotToLike = true

        try {
          const response = await axios.put(this.endpoint)
          // 応答が成功したら、最終的な値で更新
          this.countLikes = response.data.countLikes
        } catch (error) {
          // 何らかのエラーが発生したら、元の値に戻す
          this.isLikedBy = false
          this.countLikes--
          this.gotToLike = false
          // エラー処理（必要に応じて）
        }
      },
      async unlike() {
        // すぐにUIを更新
        this.isLikedBy = false
        this.countLikes--
        this.gotToLike = false

        try {
          const response = await axios.delete(this.endpoint)
          // 応答が成功したら、最終的な値で更新
          this.countLikes = response.data.countLikes
        } catch (error) {
          // 何らかのエラーが発生したら、元の値に戻す
          this.isLikedBy = true
          this.countLikes++
          this.gotToLike = true
          // エラー処理（必要に応じて）
        }
      }
    },
  }
</script>

<style scoped>
.animated-like {
  position: absolute;
  font-size: 3em;
  color: red;
  animation: moveUp 1s forwards;
}
@keyframes moveUp {
  from {
    transform: translateY(-20px) translateX(-10px);
    opacity: 1;
  }
  to {
      transform: translateY(-100px) translateX(-10px);
      opacity: 0;
  }
}
</style>
