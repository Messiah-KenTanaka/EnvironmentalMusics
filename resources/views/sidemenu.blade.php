<div class="col-3 mt-5 d-none d-md-block">
    <div class="form-group sidemenu-fixed">
        <button class="dropdown-item py-2" type="button"
            onclick="location.href='/'">
            <i class="fas fa-home"></i>
            <span class="ml-3">ホーム</span>
        </button>
        <div class="dropdown-divider"></div>

        @auth
            <button class="dropdown-item py-2" type="button"
                onclick="location.href='{{ route('articles.create') }}'">
                <i class="fas fa-feather"></i>
                <span class="ml-3">ポスト</span>
            </button>
            <div class="dropdown-divider"></div>
        @endauth

        <button class="dropdown-item py-2" type="button" data-toggle="modal" data-target="#dmaintenanceModal"
            onclick="location.href='#'">
            <i class="fas fa-map-marker-alt"></i>
            <span class="ml-3">マップ</span>
        </button>
        <div class="dropdown-divider"></div>
        <button class="dropdown-item py-2" type="button"
            onclick="location.href='{{ route('ranking.index') }}'">
            <i class="fas fa-crown"></i>
            <span class="ml-2">ランキング</span>
        </button>
        <div class="dropdown-divider"></div>

        @auth
            <button class="dropdown-item py-2" type="button"
                onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
                <i class="fas fa-user-alt"></i>
                <span class="ml-3">マイページ</span>
            </button>
            <div class="dropdown-divider"></div>
            <button form="logout-button" class="dropdown-item py-2" type="submit">
                <i class="fas fa-sign-in-alt"></i>
                <span class="ml-3">ログアウト</span>
            </button>
            <div class="dropdown-divider"></div>
        @endauth

        @auth
            <button class="dropdown-item py-2" type="button"
                    onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
                @if (Auth::user()->image)
                <img src="{{ Auth::user()->image }}" class="rounded-circle mr-2" width="25" height="25">
                @else
                <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle mr-2" width="25" height="25">
                @endif
                {{ Functions::getNameEllipsis(Auth::user()->name) }}
            </button>
            <div class="dropdown-divider"></div>
        @endauth

        @guest
            <button class="dropdown-item py-2" type="button"
                onclick="location.href='{{ route('register') }}'">
                <i class="fas fa-user-alt"></i>
                <span class="ml-3">ユーザー登録</span>
            </button>
            <div class="dropdown-divider"></div>
        @endguest

        @guest
            <button class="dropdown-item py-2" type="button"
                onclick="location.href='{{ route('login') }}'">
                <i class="fas fa-sign-in-alt"></i>
                <span class="ml-3">ログイン</span>
            </button>
            <div class="dropdown-divider"></div>
        @endguest

    </div>
</div>
