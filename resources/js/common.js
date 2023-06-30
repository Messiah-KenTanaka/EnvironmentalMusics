$(function() {
    // 投稿ボタンクリックでローディング
    $('form').submit(function() {
        $('#submit-btn').addClass('button-loading');
        $('#submit-btn').prop('disabled', true);
        $('#submit-text').text('処理中…');
        $('.spinner-border').removeClass('d-none');
    });

    // 投稿時に詳細を表示・非表示するボタン
    $(document).ready(function(){
        $("#ArticleToggleButton").click(function(){
            $("#ArticleDetailDiv").toggle();
            var buttonText = $("#ArticleToggleButton").text().trim() === '詳細を記載する' ? '詳細を非表示にする' : '詳細を記載する';
            $("#ArticleToggleButton").html('<i class="fa-regular fa-pen-to-square"></i> ' + buttonText);
        });
    });
});
