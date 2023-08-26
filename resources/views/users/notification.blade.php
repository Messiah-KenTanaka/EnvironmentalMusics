<a href="{{ route('articles.show', ['article' => $notification->article->id, 'notificationId' => $notification->id]) }}" class="text-dark">
    <div class="card mt-3 {{ $notification->read ? '' : 'bg-light-green' }}">
        <div class="card-body d-flex">
            <div class="mr-3">
                @if ($notification->sender->image)
                    <img src="{{ $notification->sender->image }}" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                @else
                    <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                @endif
            </div>
            <div>
                <span class="text-dark">
                    <strong>{{ $notification->sender->nickname }}</strong>
                    @if ($notification->type === 'comment')
                        <span class="text-muted">さんがあなたの記事にコメントしました。</span>
                        <p class="mt-2 mb-0">{{ Functions::getCommentFortyEightEllipsis($notification->article_comment->comment) }}</p>
                    @endif
                </span>
            </div>
        </div>
    </div>
</a>