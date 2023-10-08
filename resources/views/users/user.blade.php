<div class="mt-sm-3">
    <div>
        @if ($user->background_image)
            <img src="{{ $user->background_image }}" class="img-fluid background-image">
        @else
            <img src="{{ asset('images/background_image01.png') }}" class="img-fluid background-image">
        @endif
    </div>
    <div class="card-body">
        <div class="d-flex flex-row">
            <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                @if ($user->image)
                    <img src="{{ $user->image }}" class="rounded-circle mb-3 user-profile-image"
                        style="width: 100px; height: 100px; object-fit: cover;">
                @else
                    <img src="{{ asset('images/noimage02.jpg') }}" class="rounded-circle mb-3 user-profile-image"
                        style="width: 100px; height: 100px; object-fit: cover;">
                @endif
            </a>
            @if (Auth::id() !== $user->id)
                <follow-button class="ml-auto" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                    :authorized='@json(Auth::check())'
                    endpoint="{{ route('users.follow', ['name' => $user->name]) }}">
                </follow-button>
            @endif
            @if (Auth::id() == $user->id)
                <a class="ml-auto" onclick="location.href='{{ route('users.edit', ['name' => $user->name]) }}'">
                    <small class="border border-pref p-2">
                        <span class="d-none d-sm-inline">プロフィール</span>編集
                    </small>
                </a>
            @endif
        </div>
        @if ($isFollowing)
            <div class="mb-2">
                <small class="bg-light rounded p-1">
                    <span class="text-muted">フォローされています</span>
                </small>
            </div>
        @endif
        <h2 class="h4 card-title m-0">
            <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark font-weight-bold">
                {{ $user->nickname }}
            </a>
            @switch(true)
                @case($user->count_prefecture >= 45)
                    <img src="{{ asset('images/lure_icon_01.png') }}" style="width: 30px; height: 30px;">
                @break

                @case($user->count_prefecture >= 30)
                    <img src="{{ asset('images/lure_icon_02.png') }}" style="width: 30px; height: 30px;">
                @break

                @case($user->count_prefecture >= 15)
                    <img src="{{ asset('images/lure_icon_03.png') }}" style="width: 30px; height: 30px;">
                @break

                @case($user->count_prefecture >= 5)
                    <img src="{{ asset('images/lure_icon_04.png') }}" style="width: 30px; height: 30px;">
                @break

                @case($user->count_prefecture >= 1)
                    <img src="{{ asset('images/lure_icon_05.png') }}" style="width: 30px; height: 30px;">
                @break

                @default
                    {{-- それ以外は何もしない --}}
            @endswitch
            <br>
            <span class="text-muted small">{{ '@' . $user->name }}</span>
        </h2>
        <div class="p-2 m-0">
            <span class="text-dark">
                {{ $user->introduction }}
            </span>
        </div>
        @if (!($record['size'] || $record['weight']))
            <div class="text-muted">自己記録：---</div>
        @else
            <div class="d-flex">
                <span class="text-muted">自己記録：</span>
                @if ($record['size'])
                    <span class="text-dark font-black-ops-one">
                        <i class="fa-solid fa-ruler-horizontal mr-1" style="color: #f91a01;"></i>
                        {{ $record['size'] }}
                    </span>
                    cm
                @endif
                @if ($record['weight'])
                    <span class="text-dark font-black-ops-one ml-2">
                        <i class="fa-solid fa-weight-scale mr-1" style="color: #41230e;"></i>
                        {{ number_format($record['weight']) }}
                    </span>
                    g
                @endif
            </div>
        @endif
        @if ($user->youtube)
            <div class="my-2">
                <span class="text-dark main-ja-font-family">
                    <i class="fa-brands fa-youtube mr-2" style="color: #ff0000;"></i>
                    {!! nl2br(Functions::makeLink(e($user->youtube))) !!}
                </span>
            </div>
        @endif
        @if ($user->twitter)
            <div class="my-2">
                <span class="text-dark main-ja-font-family">
                    <i class="fa-brands fa-square-twitter mr-2" style="color: #1d96e8;"></i>
                    {!! nl2br(Functions::makeLink(e($user->twitter))) !!}
                    </>
            </div>
        @endif
        @if ($user->instagram)
            <div class="my-2">
                <span class="text-dark main-ja-font-family">
                    <i class="fa-brands fa-square-instagram mr-2" style="color: #f7695b;"></i>
                    {!! nl2br(Functions::makeLink(e($user->instagram))) !!}
                    </>
            </div>
        @endif
        @if ($user->tiktok)
            <div class="my-2">
                <span class="text-dark main-ja-font-family">
                    <i class="fa-brands fa-tiktok mr-2" style="color: #000000;"></i>
                    {!! nl2br(Functions::makeLink(e($user->tiktok))) !!}
                    </>
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
            @if (Auth::id() == $user->id)
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
                            <a href="{{ route('users.confirmDeleteUser', ['userId' => $user->id]) }}"
                                class="dropdown-item text-danger">
                                アカウントを削除
                            </a>
                        </div>
                    </div>
                </div>
                <!-- dropdown -->
            @endif

            @if (!(Auth::id() === $user->id))
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
                                <a class="dropdown-item text-danger" data-toggle="modal"
                                    data-target="#modal-user-block-{{ $user->id }}">
                                    <i class="fa-solid fa-ban"></i> {{ $user->nickname }}さんをブロック
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
                                        {{ $user->nickname }}さんをブロックします。よろしいですか？
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
