<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card text-center">
                <a href="{{ route('ranking.index') }}" class="card-body text-decoration-none text-dark">
                    <i class="fas fa-crown fa-5x mb-3"></i>
                    <h5 class="card-title">ランキングから探す</h5>
                    <p class="card-text">一番釣れている魚が見つかる！</p>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <!-- dropup -->
            <div class="card text-center">
                <a class="card-body" id="navbarDropdownTagLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bolt fa-5x mb-3"></i>
                    <h5 class="card-title">トレンドから探す</h5>
                    <p class="card-text">今の流行りを見つけよう！</p>
                </a>
                <div class="dropdown-menu full-width-dropdown dropdown-primary" aria-labelledby="navbarDropdownTagLink">
                    <span class="dropdown-item font-weight-bold py-2"><i class="fas fa-bolt mr-2"></i>最近のトレンド</span>
                    <div class="dropdown-divider"></div>
                    @foreach($tags as $tag)
                    <button class="dropdown-item" type="button"
                            onclick="location.href='{{ route('tags.show', ['name' => $tag->name]) }}'">
                        <span class="ml-1">{{ Functions::getNameTenEllipsis($tag->name) }}</span>
                    </button>
                    @endforeach
                </div>
            </div>
            <!-- dropup -->
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card text-center">
                <a href="{{ route('map.index') }}" class="card-body text-decoration-none text-dark">
                    <i class="fas fa-map-marker-alt fa-5x mb-3"></i>
                    <h5 class="card-title">釣り場から探す</h5>
                    <p class="card-text">行きたい釣り場を見つける！</p>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card text-center">
                <a href="{{ route('weather.index') }}" class="card-body text-decoration-none text-dark">
                    <i class="fas fa-cloud-sun fa-5x mb-3"></i>
                    <h5 class="card-title">天気を調べる</h5>
                    <p class="card-text">天気をチェックしよう！</p>
                </a>
            </div>
        </div>
    </div>
</div>