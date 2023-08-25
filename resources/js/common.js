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
    
    

    // 投稿画像プレビューを表示する
    window.articlePreviewImage = function(input, labelId, nextLabelId) {
        var file = input.files[0];
        var reader = new FileReader();
    
        reader.addEventListener("load", function () {
            var labelElement = document.querySelector('#' + labelId);
            if (labelElement) {
                labelElement.style.backgroundImage = 'url(' + reader.result + ')';
                
                // アイコンを非表示にする
                var iconElement = labelElement.querySelector('i.fa-solid');
                if (iconElement) {
                    iconElement.style.display = 'none';
                }
                
                // 次のアップロードセクションを表示する
                if (nextLabelId) {
                    var nextUploadSection = document.querySelector('#uploadSection' + nextLabelId.charAt(nextLabelId.length-1));
                    if (nextUploadSection) {
                        nextUploadSection.style.display = 'block';
                    }
                }
            }
        }, false);
    
        if (file) {
            reader.readAsDataURL(file);
        }
    };    

    // ユーザー編集プレビュー画像を表示する
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

    // ユーザー編集プレビュー背景画像画像を表示する
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
    let accumulatedScroll = 0;  // 追加: 累計スクロール量の追跡
    let scrollDirection = null; // 追加: スクロールの方向 (up or down)
    
    const headerNavbar = $('#navbar');
    const footerNavbar = $('#bottom-navbar');
    const floatingButton = $('#floating-button');
    
    $(window).scroll(function() {
        const currentScrollPosition = $(this).scrollTop();
        
        // スクロールの方向を検出
        const currentDirection = currentScrollPosition > lastScrollPosition ? "down" : "up";
        
        // スクロールの方向が前回と違っていれば、累計をリセット
        if (scrollDirection !== currentDirection) {
            accumulatedScroll = 0;
            scrollDirection = currentDirection;
        }
        
        accumulatedScroll += Math.abs(currentScrollPosition - lastScrollPosition);
    
        if (accumulatedScroll >= 300) {
            // Header logic
            if (currentDirection === "down") {
                headerNavbar.css('top', '-100px');
                footerNavbar.css('bottom', '-100px');
                floatingButton.css('bottom', '10px');
            } else {
                headerNavbar.css('top', '0');
                footerNavbar.css('bottom', '0');
                floatingButton.css('bottom', '4.5rem');
            }
            accumulatedScroll = 0;  // 累計をリセット
        }
    
        lastScrollPosition = currentScrollPosition;
    });
});
