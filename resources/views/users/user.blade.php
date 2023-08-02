<div class="card mt-3">
    <div>
        @if ($user->background_image)
            <img src="{{ $user->background_image }}" class="img-fluid background-image">
        @else
            <img src="{{ asset('images/background_image01.png')}}" class="img-fluid background-image">
        @endif
    </div>
    <div class="card-body">
        <div class="d-flex flex-row">
            <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                @if ($user->image)
                    <img src="{{ $user->image }}" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
                @else
                    <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
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
                <a class="ml-auto"
                    onclick="location.href='{{ route('users.edit', ['name' => $user->name]) }}'">
                    <small class="border border-pref p-2">
                        プロフィール編集
                    </small>
                </a>
            @endif
        </div>
        <h2 class="h4 card-title m-0">
            <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark font-weight-bold">
                {{ $user->name }}
            </a>
        </h2>
        <div class="p-2 m-0">
            <span class="text-dark">
            {{ $user->introduction }}
            </span>
        </div>
        <h3 class="h6 card-title m-0">
            <div class="text-dark mt-2">
                -自己記録-
            </div>
        </h3>
        @if (!($record['size'] || $record['weight']))
            <div class="m-2">なし</div>
        @else
            <div class="d-flex">
                @if ($record['size'])
                    <div class="m-2">
                        <span class="text-dark main-ja-font-family">
                            <i class="fa-solid fa-ruler-horizontal"></i>
                            {{ $record['size'] }}
                            cm
                        </span>
                    </div>
                @endif
                {{-- @if ($record['size'] && $record['weight'])
                    <span class="m-1">
                    /
                    </span>
                @endif --}}
                @if ($record['weight'])
                    <div class="m-2">
                        <span class="text-dark main-ja-font-family">
                            <i class="fa-solid fa-weight-scale"></i>
                            {{ number_format($record['weight']) }}
                            g
                        </span>
                    </div>
                @endif
            </div>
            {{-- トータルサイズとウェイトは現状非表示に --}}
            {{-- <div class="d-flex">
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
            </div> --}}
        @endif
        @if ($user->youtube)
            <div class="my-2">
                <span class="text-dark main-ja-font-family">
                    Youtube：
                    {!! nl2br(Functions::makeLink(e( $user->youtube ))) !!}
                </span>
            </div>
        @endif
        @if ($user->twitter)
            <div class="my-2">
                <span class="text-dark main-ja-font-family">
                    Twitter：
                    {!! nl2br(Functions::makeLink(e( $user->twitter ))) !!}
                </span>
            </div>
        @endif
        <span class="text-muted small">
            <i class="fa-regular fa-calendar-days"></i>
            {{ $user->created_at->format('Y年m月d日') }}からBASSERを利用しています
        </span>
    </div>
    <div class="card-body">
        <div class="card-text d-flex">
            <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="text-muted mr-2">
                <span class="font-weight-bold">{{ $user->count_followings }}</span> フォロー中
            </a>
            <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="text-muted">
                <span class="font-weight-bold">{{ $user->count_followers }}</span> フォロワー
            </a>
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
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('users.block', ['name' => $user->name]) }}" class="dropdown-item">
                                ブロックリスト
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('users.confirmDeleteUser', ['userId' => $user->id]) }}" class="dropdown-item text-danger">
                                アカウントを削除
                            </a>
                        </div>
                    </div>
                </div>
                <!-- dropdown -->
            @endif

            @if( !(Auth::id() === $user->id) )
                @auth
                    <!-- dropdown -->
                    <div class="ml-auto card-text">
                        <div class="dropdown">
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <button type="button" class="btn btn-link text-muted m-0 p-2">
                            <i class="fa-solid fa-ban"></i>
                            </button>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-user-block-{{ $user->id }}">
                            <i class="fa-solid fa-ban"></i> {{ $user->name }}さんをブロック
                            </a>
                        </div>
                        </div>
                    </div>
                    <!-- dropdown -->
                    <!-- modal -->
                    <div id="modal-user-block-{{ $user->id }}" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="demoModalTitle">確認</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <form method="POST" action="{{ route('users.userBlock', ['userId' => Auth::id()]) }}">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="article_user_id" value="{{ $user->id }}">
                            <div class="modal-body">
                                {{ $user->name }}さんをブロックします。よろしいですか？
                            </div>
                            <div class="border-maintenance-modal modal-footer justify-content-between">
                                <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                                <button type="submit" class="btn btn-danger loading-btn">OK</button>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <!-- modal -->
                @endauth
            @endif
        </div>
    </div>
</div>
