<div class="card mt-3">
    <div class="card-body">
        <div class="d-flex flex-row">
            <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-dark">
            @if ($person->image)
                <img src="{{ $person->image }}" class="rounded-circle mb-3" width="80" height="80">
            @else
                <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle mb-3" width="80" height="80">
            @endif
            </a>
            @if( Auth::id() !== $person->id )
            <follow-button
                class="ml-auto"
                :initial-is-followed-by='@json($person->isFollowedBy(Auth::user()))'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('users.follow', ['name' => $person->name]) }}"
            >
            </follow-button>
            @endif
        </div>
        <h2 class="h5 card-title m-0">
            <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-dark">{{ $person->name }}</a>
        </h2>
    </div>
</div>
    