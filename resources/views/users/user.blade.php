<div class="card mt-3">
    <div class="card-body">
        <div class="d-flex flex-row">
            <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                @if ($user->image)
                    <img src="{{ $user->image }}" class="rounded-circle mb-3" width="80" height="80">
                @else
                    <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle mb-3" width="80" height="80">
                @endif
            </a>
            @if( Auth::id() !== $user->id )
                <follow-button
                    class="ml-auto"
                    :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                    :authorized='@json(Auth::check())'
                    endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
                >
                </follow-button>
            @endif
            @if( Auth::id() == $user->id )
                <!-- dropdown -->
                <div class="ml-auto card-text">
                    <div class="dropdown">
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <button type="button" class="btn btn-link text-muted m-0 p-2">
                            <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('users.edit', ['name' => $user->name]) }}" class="dropdown-item">
                                プロフィール編集
                            </a>
                        </div>
                    </div>
                </div>
                <!-- dropdown -->
            @endif

        </div>
        <h2 class="h4 card-title m-0">
            <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            {{ $user->name }}
            </a>
        </h2>
        <div class="m-2">
            <span class="text-dark font-weight-bold">
                称号：
                @if ($record['total_size'] > 50000000 || $record['total_weight'] > 1000000000)
                    神 <i class="fa-solid fa-star text-color-gold"></i><i class="fa-solid fa-star text-color-gold"></i><i class="fa-solid fa-star text-color-gold"></i><i class="fa-solid fa-star text-color-gold"></i><i class="fa-solid fa-star text-color-gold"></i>
                @elseif ($record['total_size'] > 5000000 || $record['total_weight'] > 100000000)
                    王 <i class="fa-solid fa-star text-color-gold"></i><i class="fa-solid fa-star text-color-gold"></i><i class="fa-solid fa-star text-color-gold"></i><i class="fa-solid fa-star text-color-gold"></i>
                @elseif ($record['total_size'] > 500000 || $record['total_weight'] > 10000000)
                    達人 <i class="fa-solid fa-star text-color-gold"></i><i class="fa-solid fa-star text-color-gold"></i><i class="fa-solid fa-star text-color-gold"></i>
                @elseif ($record['total_size'] > 50000 || $record['total_weight'] > 1000000)
                    熟練 <i class="fa-solid fa-star text-color-gold"></i><i class="fa-solid fa-star text-color-gold"></i>
                @elseif ($record['total_size'] > 5000 || $record['total_weight'] > 100000)
                    職人 <i class="fa-solid fa-star text-color-gold"></i>
                @else
                    見習い <i class="fa-solid fa-star-half-stroke text-color-gold"></i>
                @endif
            </span>
        </div>
        <h3 class="h6 card-title m-0">
            <div class="text-dark">
                自己記録
            </div>
        </h3>
        @if (!($record['size'] || $record['weight']))
            <div class="m-2">なし</div>
        @else
            <div class="d-flex">
                @if ($record['size'])
                    <div class="m-2">
                        <span class="text-dark main-ja-font-family">
                            {{ $record['size'] }}
                            cm
                        </span>
                    </div>
                @endif
                @if ($record['size'] && $record['weight'])
                    <span class="m-1">
                    /
                    </span>
                @endif
                @if ($record['weight'])
                    <div class="m-2">
                        <span class="text-dark main-ja-font-family">
                            {{ number_format($record['weight']) }}
                            g
                        </span>
                    </div>
                @endif
            </div>
            <div class="d-flex">
                @if ($record['total_size'])
                    <div class="mx-2">
                        <span class="text-dark main-ja-font-family">
                            Total
                            {{ $record['total_size'] }}
                            cm
                        </span>
                    </div>
                @endif
                @if ($record['total_size'] && $record['total_weight'])
                    <span class="mx-1">
                    /
                    </span>
                @endif
                @if ($record['total_weight'])
                    <div class="mx-2">
                        <span class="text-dark main-ja-font-family">
                            Total
                            {{ number_format($record['total_weight']) }}
                            g
                        </span>
                    </div>
                @endif
            </div>
        @endif
        <div class="card-body m-0">
            <span class="text-dark">
            {{ $user->introduction }}
            </span>
        </div>
    </div>
    <div class="card-body">
        <div class="card-text">
            <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="text-muted">
                {{ $user->count_followings }} フォロー
            </a>
            <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="text-muted">
                {{ $user->count_followers }} フォロワー
            </a>
        </div>
    </div>
</div>
