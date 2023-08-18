<template>
  <div class="card-text">
    <a class="text-dark" :href="articleLink">
      {{ articleBody }}
    </a>
    
    <!-- リンクのプレビュー情報を表示 -->
    <div v-if="preview" class="my-3 preview-container">
      <a :href="preview.url" target="_blank" rel="noopener noreferrer">
        <img :src="preview.image" alt="Preview Image" />
        <p class="font-weight-bold mt-2">{{ preview.title }}</p>
      </a>
      <p>{{ preview.description }}</p>
    </div>
    <!-- エラーメッセージを表示 -->
    <p v-if="error" class="text-danger">{{ error }}</p>
  </div>
</template>

<script>
export default {
  props: ['article'],
  data() {
    return {
      preview: null,
      error: null
    }
  },
  computed: {
    articleLink() {
      return `/articles/${this.article.id}`;
    },
    articleBody() {
      return this.article.body;
    }
  },
  mounted() {
    this.fetchLinkPreview();
  },
  methods: {
    async fetchLinkPreview() {
      // 正規表現を用いてURLを抽出する
      let urlPattern = /(https?:\/\/[^\s]+)/g;
      let match = this.article.body.match(urlPattern);

      // URLが見つかった場合のみ、APIを呼び出す
      if (match && match[0]) {
        let url = match[0];

        axios.post('/api/link-preview', {
            encodedUrl: encodeURIComponent(url)
        })
        .then(response => {
          if(response.data.error && response.data.error === 429) {
              // エラーコードが429の場合の処理
              this.error = "現在、多くのリクエストがあるため、プレビューが一時的に利用できません。";
          } else {
              this.preview = response.data;
          }
        })
        .catch(error => {
          console.error('プレビューエラー:' + error.message);
          this.error = "プレビューの取得中にエラーが発生しました";
              });
      }
    }
  }
}
</script>

<style scoped>
/* コンポーネントのスタイル部分に追加 */
img {
  max-width: 100%; /* 最大幅を100%に設定 */
  height: auto; /* 高さは自動に設定 */
  border-radius: 20px;
}
/* コンポーネントのスタイル部分に追加 */
.preview-container {
  position: relative;
  padding-left: 20px; /* ここで左側の余白を確保します。 */
}
.preview-container::before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  width: 4px;
  background-color: #007bff; /* これはBootstrapのデフォルトの青色ですが、お好みの色に変更してください */
}
</style>
