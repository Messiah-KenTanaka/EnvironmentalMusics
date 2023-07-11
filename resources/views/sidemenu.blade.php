<div class="col-3 d-none d-xl-block">
    <div class="form-group mt-3">
        @include('search')
        <button class="dropdown-item py-2" type="button"
            onclick="location.href='/'">
            <i class="fas fa-home"></i>
            <span class="ml-3 font-weight-bold">Home</span>
        </button>
        <div class="dropdown-divider"></div>

        {{--  @auth
            <button class="dropdown-item py-2" type="button"
                onclick="location.href='{{ route('articles.create') }}'">
                <i class="fa-solid fa-fish"></i>
                <span class="ml-3 font-weight-bold">Post</span>
            </button>
            <div class="dropdown-divider"></div>
        @endauth  --}}
        
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
            onclick="location.href='{{ route('map.index') }}'">
            <i class="fa-solid fa-map-location-dot"></i>
            <span class="ml-3 font-weight-bold">Map</span>
        </button>
        <div class="dropdown-divider"></div>

        <button class="dropdown-item py-2" type="button"
            onclick="location.href='{{ route('weather.index') }}'">
            <i class="fa-solid fa-cloud-sun"></i>
            <span class="ml-3 font-weight-bold">Weather</span>
        </button>
        <div class="dropdown-divider"></div>

        <button class="dropdown-item py-2" type="button"
            onclick="location.href='{{ route('search.index') }}'">
            <i class="fa-solid fa-magnifying-glass"></i>
            <span class="ml-3 font-weight-bold">Search</span>
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
                    <img src="{{ Auth::user()->image }}" class="rounded-circle mr-2" style="width: 25px; height: 25px; object-fit: cover;">
                @else
                    <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle mr-2" style="width: 25px; height: 25px; object-fit: cover;">
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

        <button class="col-12 mx-auto btn blue-gradient rounded-pill" type="button"
            onclick="location.href='{{ route('articles.create') }}'">
            <img src="{{ asset('images/fish_icon.svg')}}" class="rounded-circle mr-1" width="25" height="25">
        </button>

        <video class="mt-5" width="100%" controls autoplay loop muted>
            <source src="{{ asset('videos/black_bass_preview.mp4') }}" type="video/mp4">
        </video>

        <span class="dropdown-item font-weight-bold mt-5 py-2"><i class="fa-solid fa-tags mr-2"></i>最近のトレンド</span>
        <div class="dropdown-divider"></div>
        @foreach($tags as $tag)
            <button class="dropdown-item py-1" type="button"
                onclick="location.href='{{ route('tags.show', ['name' => $tag->name]) }}'">
                {{ Functions::getNameTenEllipsis($tag->name) }}
            </button>
        @endforeach
        <div class="dropdown-divider"></div>

    </div>
</div>
