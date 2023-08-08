$(function() {
    // 投稿ボタンクリックでローディング
    $('form').submit(function() {
        $('#submit-btn').addClass('button-loading');
        $('#submit-btn').prop('disabled', true);
        $('#submit-text').text('処理中…');
        $('.spinner-border').removeClass('d-none');
    });

    $(document).ready(function() {
        $('#collapseDetail').on('show.bs.collapse', function () {
            // 展開時の処理
            $('#ArticleToggleButton').html('詳細情報を閉じる  <i class="fas fa-caret-up ml-1"></i>');
        });
    
        $('#collapseDetail').on('hide.bs.collapse', function () {
            // 折りたたみ時の処理
            $('#ArticleToggleButton').html('詳細情報を入力<i class="fas fa-caret-down ml-1"></i>');
        });
    });
    
    

    // プレビュー画像を表示する
    window.previewImage = function() {
        var file = document.querySelector('#image').files[0];
        var reader = new FileReader();

        reader.addEventListener("load", function () {
            document.querySelector('#preview').style.display = 'block';
            document.querySelector('#preview').src = reader.result;
            var arrowIcon = document.querySelector('#arrow-icon');
            if (arrowIcon) {
                arrowIcon.style.display = 'block';
            }
            if (file) {
                document.querySelector('#fileName').textContent = file.name;
            }
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    };

    // プレビュー背景画像画像を表示する
    window.previewBackgroundImage = function() {
        var file = document.querySelector('#background_image').files[0];
        var reader = new FileReader();

        reader.addEventListener("load", function () {
            document.querySelector('#background_preview').style.display = 'block';
            document.querySelector('#background_preview').src = reader.result;
            var arrowIcon = document.querySelector('#arrow-icon2');
            if (arrowIcon) {
                arrowIcon.style.display = 'block';
            }
            if (file) {
                document.querySelector('#background_fileName').textContent = file.name;
            }
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    };


    // ヘッダースクロール
    let lastScrollPosition = 0;
    const navbar = $('#navbar');

    $(window).scroll(function () {
        const currentScrollPosition = $(this).scrollTop();
        if (currentScrollPosition > lastScrollPosition) {
            // スクロール位置が下に移動した場合、ヘッダーを非表示にする
            navbar.css('top', '-100px');  // ヘッダーの高さに応じて調整
        } else {
            // スクロール位置が上に移動した場合、ヘッダーを表示する
            navbar.css('top', '0');
        }
        lastScrollPosition = currentScrollPosition;
    });

});
