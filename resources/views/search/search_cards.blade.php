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
                <a class="card-body" data-toggle="modal" data-target="#trendModal">
                    <i class="fas fa-bolt fa-5x mb-3"></i>
                    <h5 class="card-title">トレンドから探す</h5>
                    <p class="card-text">今の流行りを見つけよう！</p>
                </a>
            </div>
            
            <div class="modal fade" id="trendModal" tabindex="-1" role="dialog" aria-labelledby="trendModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="trendModalLabel">最近のトレンド</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @foreach($tags as $tag)
                            <button class="dropdown-item" type="button"
                                    onclick="location.href='{{ route('tags.show', ['name' => $tag->name]) }}'">
                                <span class="ml-1">{{ Functions::getNameFifteenEllipsis($tag->name) }}</span>
                            </button>
                            @endforeach
                        </div>
                    </div>
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