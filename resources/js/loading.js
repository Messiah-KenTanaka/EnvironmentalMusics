// 画面遷移時ローディング
$(function () {
    //ローディング表示
    show_loading();

    //2秒後にローディング非表示
    setTimeout(function () {
        hide_loading();
    }, 1000);
})
//ローディング表示
function show_loading() {
    $('#loading').removeClass('d-none');
}
//ローディング非表示
function hide_loading() {
    $('#loading').addClass('d-none');
}

// ボタンローディング 投稿・プロフ更新
$(function () {
    $(".loading-btn").on("click", function(){
        console.log('hoge');
        $("#overlay").fadeIn(500); //二度押しを防ぐloading表示
        setTimeout(function(){
            $("#overlay").fadeOut(500);
        },10000);
    });
})