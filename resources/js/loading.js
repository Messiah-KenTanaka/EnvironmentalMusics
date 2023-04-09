// 投稿ボタンクリックでローディング
$(function() {
    $('form').submit(function() {
        $('#submit-btn').addClass('button-loading');
        $('#submit-btn').prop('disabled', true);
        $('#submit-text').text('ロード中…');
        $('.spinner-border').removeClass('d-none');
    });
});
