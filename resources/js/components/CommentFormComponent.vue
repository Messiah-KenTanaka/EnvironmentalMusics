<template>
  <div>
    <form @submit.prevent="submitComment" class="mt-3">
      <div class="form-group d-flex align-items-center">
        <img :src="userImage" class="image-style rounded-circle mr-2">
        <textarea v-model="commentText" class="form-control" rows="1" placeholder="コメントする..." required></textarea>
        <button type="submit" id="submit-btn" class="btn btn-sm rounded-pill bg-primary text-white p-2 d-flex align-items-center justify-content-center">
          <i class="fa-solid fa-paper-plane large-icon-150"></i>
          <div v-if="loading" class="spinner-border spinner-border-sm ml-2" role="status">
            <span class="sr-only">読み込み中...</span>
          </div>
        </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  props: ['authId', 'authImage', 'articleId'],
  data() {
    return {
      commentText: '',
      loading: false
    };
  },
  computed: {
    userImage() {
      return this.authImage || '/images/noimage01.png';
    },
  },
  methods: {
    async submitComment() {
      this.loading = true;

      try {
        await axios.post('/comment', {
          user_id: this.authId,
          article_id: this.articleId,
          comment: this.commentText
        });

        this.commentText = ''; // テキストエリアをクリア

        this.$toasted.show('コメントしました。', {
              type: 'success',
              duration: 5000,
          });

        // 成功時
        this.$eventBus.$emit('commentAdded');

      } catch (error) {
        console.error('コメントの送信に失敗しました:', error);
        this.$toasted.show('コメントに失敗しました。', {
              type: 'error',
              duration: 5000,
          });
      }

      this.loading = false;
    }
  }
}
</script>

<style scoped>
.image-style {
  width: 30px;
  height: 30px;
  object-fit: cover;
}
</style>