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
