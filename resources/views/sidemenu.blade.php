<div class="col-3 d-none d-xl-block">
    <div class="form-group nav-item mt-3">
        @include('search')
        <button class="dropdown-item py-2" type="button"
            onclick="location.href='/'">
            <i class="fas fa-home"></i>
            <span class=" font-weight-bold">Home</span>
        </button>
        <div class="dropdown-divider"></div>

        {{--  @auth
            <button class="dropdown-item py-2" type="button"
                onclick="location.href='{{ route('articles.create') }}'">
                <i class="fa-solid fa-fish"></i>
                <span class=" font-weight-bold">Post</span>
            </button>
            <div class="dropdown-divider"></div>
        @endauth  --}}
        
        {{--  マップは実装までコメントアウト
        <button class="dropdown-item py-2" type="button" data-toggle="modal" data-target="#dmaintenanceModal"
            onclick="location.href='#'">
            <i class="fas fa-map-marker-alt"></i>
            <span class=" pl-1 font-weight-bold">Map</span>
        </button>
        <div class="dropdown-divider"></div>  --}}

        <button class="dropdown-item py-2" type="button"
            onclick="location.href='{{ route('ranking.index') }}'">
            <i class="fas fa-crown"></i>
            <span class=" font-weight-bold">Ranking</span>
        </button>
        <div class="dropdown-divider"></div>

        <button class="dropdown-item py-2" type="button"
            onclick="location.href='{{ route('map.index') }}'">
            <i class="fas fa-map-marker-alt"></i>
            <span class=" font-weight-bold">Map</span>
        </button>
        <div class="dropdown-divider"></div>

        <button class="dropdown-item py-2" type="button"
            onclick="location.href='{{ route('weather.index') }}'">
            <i class="fa-solid fa-cloud-sun"></i>
            <span class=" font-weight-bold">Weather</span>
        </button>
        <div class="dropdown-divider"></div>

        <button class="dropdown-item py-2" type="button"
            onclick="location.href='{{ route('search.index') }}'">
            <i class="fa-solid fa-magnifying-glass"></i>
            <span class=" font-weight-bold">Search</span>
        </button>
        <div class="dropdown-divider"></div>

        @auth
            <button class="dropdown-item py-2" type="button"
                onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
                <i class="fas fa-user-alt"></i>
                <span class=" font-weight-bold">MyPage</span>
            </button>
            <div class="dropdown-divider"></div>
            <button form="logout-button" class="dropdown-item py-2" type="submit">
                <i class="fas fa-sign-in-alt"></i>
                <span class=" font-weight-bold">Logout</span>
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
                <span class=" font-weight-bold">UserRegister</span>
            </button>
            <div class="dropdown-divider"></div>
        @endguest

        @guest
            <button class="dropdown-item py-2" type="button"
                onclick="location.href='{{ route('login') }}'">
                <i class="fas fa-sign-in-alt"></i>
                <span class=" font-weight-bold">Login</span>
            </button>
            <div class="dropdown-divider"></div>
        @endguest

        <button class="col-12 mx-auto btn bg-dark text-white rounded-pill" type="button"
            onclick="location.href='{{ route('articles.create') }}'">
            <i class="fa-solid fa-plus"></i>
        </button>

        <video class="mt-5" width="100%" controls autoplay loop muted>
            <source src="{{ asset('videos/black_bass_preview.mp4') }}" type="video/mp4">
        </video>

        <span class="dropdown-item font-weight-bold mt-5 py-2"><i class="fas fa-bolt mr-2"></i>最近のトレンド</span>
        <div class="dropdown-divider"></div>
            @foreach($tags as $i => $tag)
                <button class="dropdown-item d-flex align-items-start" type="button"
                        onclick="location.href='{{ route('tags.show', ['name' => $tag->name]) }}'">
                    <div>
                        {{ ++$i }}.
                    </div>
                    <div>
                        <span class="ml-1 font-weight-bold">{{ '#' . Functions::getNameTenEllipsis($tag->name) }}</span><br>
                        <span class="text-muted">{{ $tag->count }}件</span>
                    </div>
                </button>
            @endforeach
        <div class="dropdown-divider"></div>

    </div>
</div>
