<div class="col-3 mt-3 d-none d-md-block">
    <div class="form-group mt-3 sidemenu-fixed">
        <button class="dropdown-item py-2" type="button"
            onclick="location.href='/'">
            <i class="fas fa-home"></i>
            <span class="ml-3 font-weight-bold">Home</span>
        </button>
        <div class="dropdown-divider"></div>

        @auth
            <button class="dropdown-item py-2" type="button"
                onclick="location.href='{{ route('articles.create') }}'">
                <i class="fa-solid fa-fish"></i>
                <span class="ml-3 font-weight-bold">Post</span>
            </button>
            <div class="dropdown-divider"></div>
        @endauth
        
        {{--  マップは実装までコメントアウト
        <button class="dropdown-item py-2" type="button" data-toggle="modal" data-target="#dmaintenanceModal"
            onclick="location.href='#'">
            <i class="fas fa-map-marker-alt"></i>
            <span class="ml-3 pl-1 font-weight-bold">Map</span>
        </button>
        <div class="dropdown-divider"></div>  --}}

        <button class="dropdown-item py-2" type="button"
            onclick="location.href='{{ route('ranking.index') }}'">
            <i class="fas fa-crown"></i>
            <span class="ml-3 font-weight-bold">Ranking</span>
        </button>
        <div class="dropdown-divider"></div>

        <button class="dropdown-item py-2" type="button"
            onclick="location.href='{{ route('weather.index') }}'">
            <i class="fa-solid fa-cloud-sun"></i>
            <span class="ml-3 font-weight-bold">Weather</span>
        </button>
        <div class="dropdown-divider"></div>


        @auth
            <button class="dropdown-item py-2" type="button"
                onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
                <i class="fas fa-user-alt"></i>
                <span class="ml-3 font-weight-bold">MyPage</span>
            </button>
            <div class="dropdown-divider"></div>
            <button form="logout-button" class="dropdown-item py-2" type="submit">
                <i class="fas fa-sign-in-alt"></i>
                <span class="ml-3 font-weight-bold">Logout</span>
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
                <i class="fa-solid fa-user-plus"></i>
                <span class="ml-3 font-weight-bold">UserRegister</span>
            </button>
            <div class="dropdown-divider"></div>
        @endguest

        @guest
            <button class="dropdown-item py-2" type="button"
                onclick="location.href='{{ route('login') }}'">
                <i class="fas fa-sign-in-alt"></i>
                <span class="ml-3 font-weight-bold">Login</span>
            </button>
            <div class="dropdown-divider"></div>
        @endguest

        <button class="col-12 mx-auto btn dusty-grass-gradient rounded-pill" type="button"
            onclick="location.href='{{ route('articles.create') }}'">
            <i class="fa-solid fa-fish"></i>
        </button>

    </div>
</div>
