<template>
    <div class="">
        <div class="comment-container">
            <div v-if="loading" class="loading">
                <div class="spinner-border" role="status">
                    <span class="sr-only">読み込み中...</span>
                </div>
            </div>
            <div class="" v-for="comment in comments" :key="comment.id">
                <div class="card-body d-flex align-items-start">
                    <a
                        :href="'/users/' + comment.user.name"
                        class="text-dark mr-3"
                    >
                        <img
                            :src="
                                comment.user.image
                                    ? comment.user.image
                                    : '/images/noimage02.jpg'
                            "
                            class="rounded-circle"
                            style="width: 30px; height: 30px; object-fit: cover"
                        />
                    </a>
                    <div class="w-100 custom-bg">
                        <div
                            class="d-flex justify-content-between align-items-start w-100"
                        >
                            <div>
                                <div class="font-weight-bold">
                                    <a
                                        :href="'/users/' + comment.user.name"
                                        class="text-dark"
                                    >
                                        {{ comment.user.nickname }}
                                    </a>
                                </div>
                                <div class="text-muted small">
                                    {{ diffForHumans(comment.created_at) }}
                                </div>
                            </div>

                            <!-- ログインユーザーの投稿の場合 -->
                            <div v-if="auth_id === comment.user.id">
                                <!-- dropdown -->
                                <div class="card-text">
                                    <div class="dropdown">
                                        <a
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            <button
                                                type="button"
                                                class="btn btn-link text-muted m-0 p-2"
                                            >
                                                <i
                                                    class="fas fa-ellipsis-v"
                                                ></i>
                                            </button>
                                        </a>
                                        <div
                                            class="dropdown-menu dropdown-menu-right"
                                        >
                                            <a
                                                class="dropdown-item text-danger"
                                                data-toggle="modal"
                                                :data-target="
                                                    '#modal-delete-' +
                                                    comment.id
                                                "
                                            >
                                                <i
                                                    class="fas fa-trash-alt mr-1"
                                                ></i
                                                >コメントを削除
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- dropdown -->

                                <!-- modal -->
                                <div
                                    :id="'modal-delete-' + comment.id"
                                    class="modal fade"
                                    tabindex="-1"
                                    role="dialog"
                                >
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div
                                                class="modal-header bg-primary text-white"
                                            >
                                                <h5 class="modal-title">
                                                    確認
                                                </h5>
                                                <button
                                                    type="button"
                                                    class="close"
                                                    data-dismiss="modal"
                                                    aria-label="閉じる"
                                                >
                                                    <span aria-hidden="true"
                                                        >&times;</span
                                                    >
                                                </button>
                                            </div>
                                            <form
                                                @submit.prevent="
                                                    deleteComment(comment.id)
                                                "
                                            >
                                                <div class="modal-body">
                                                    コメントを削除します。よろしいですか？
                                                </div>
                                                <div
                                                    class="border-maintenance-modal modal-footer justify-content-between"
                                                >
                                                    <a
                                                        class="btn btn-outline-grey"
                                                        data-dismiss="modal"
                                                        >キャンセル</a
                                                    >
                                                    <button
                                                        type="submit"
                                                        class="btn btn-danger loading-btn"
                                                    >
                                                        削除する
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal -->
                            </div>
                        </div>
                        <div class="card-text pt-2">
                            <span>
                                {{ comment.comment }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";
import "moment/locale/ja";

export default {
    props: ["article_id", "auth_id"],
    data() {
        return {
            comments: [],
            loading: true,
        };
    },
    created() {
        moment.locale("ja");
        this.fetchComments();
        this.$eventBus.$on("commentAdded", this.fetchComments);
    },
    methods: {
        diffForHumans(date) {
            return moment(date).fromNow();
        },
        deleteComment(commentId) {
            axios
                .patch(`/comment/delete/${commentId}`, {})
                .then((response) => {
                    // console.log('コメント削除処理:成功', response.data);
                    $("#modal-delete-" + commentId).modal("hide");
                    this.$toasted.show("コメントを削除しました。", {
                        type: "success",
                        duration: 5000,
                    });
                    this.fetchComments();
                })
                .catch((error) => {
                    console.error(error.response.data.error);
                    $("#modal-delete-" + commentId).modal("hide");
                    this.$toasted.show("コメントの削除に失敗しました。", {
                        type: "error",
                        duration: 5000,
                    });
                });
        },
        fetchComments() {
            axios
                .get(`/api/article/${this.article_id}/comments`)
                .then((response) => {
                    this.comments = response.data.data;
                    this.loading = false;
                })
                .catch((error) => {
                    console.error(error.response.data.data.error);
                    this.loading = false;
                });
        },
    },
};
</script>

<style scoped>
.comment-container {
    position: relative;
    height: 600px;
    overflow-y: auto;
}
.loading {
    position: absolute;
    top: 10%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 2em;
}
.custom-bg {
    background-color: #f5f5f5; /* 薄いグレー色 */
    border-radius: 20px;
    padding: 1rem;
}
</style>
