<template>
  <div>
    <button type="button" class="btn m-0 p-1 shadow-none" @click="clickRetweet">
      <i class="fa-solid fa-retweet" :class="{'green-text': this.isRetweetedBy}"/>
    </button>
    {{ countRetweets }}
  </div>
</template>

<script>
  export default {
    props: {
      initialIsRetweetedBy: {
        type: Boolean,
        default: false
      },
      initialCountRetweets: {
        type: Number,
        default: 0
      },
      authorized: {
        type: Boolean,
        default: false
      },
      endpoint: {
        type: String
      },
    },
    data() {
      return {
        isRetweetedBy: this.initialIsRetweetedBy,
        countRetweets: this.initialCountRetweets
      };
    },
    methods: {
      clickRetweet() {
        if (!this.authorized) {
          alert('リツイート機能はログイン中のみ使用できます');
          return;
        }

        this.isRetweetedBy
          ? this.unRetweet()
          : this.retweet();
      },
      async retweet() {
        this.isRetweetedBy = true;
        this.countRetweets++;

        try {
          const response = await axios.put(this.endpoint);
          this.countRetweets = response.data.countRetweets;

          this.$toasted.show('リツイートしました。', {
            type: 'success',
            duration: 5000,
          });
        } catch (error) {
          this.isRetweetedBy = false;
          this.countRetweets--;
          
          this.$toasted.show('リツイートに失敗しました。', {
            type: 'error',
            duration: 5000,
          });
        }
      },
      async unRetweet() {
        this.isRetweetedBy = false;
        this.countRetweets--;

        try {
          const response = await axios.delete(this.endpoint);
          this.countRetweets = response.data.countRetweets;
        } catch (error) {
          this.isRetweetedBy = true;
          this.countRetweets++;
          // エラー処理
        }
      }
    }
  }
</script>

<style scoped>

</style>
