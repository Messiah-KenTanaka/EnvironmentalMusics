<div class="card mt-3">
    <div class="card-body">
        <div class="d-flex flex-row align-items-center">
            <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-dark">
            @if ($person->image)
                <img src="{{ $person->image }}" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
            @else
                <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
            @endif
            </a>
            <h2 class="h5 card-title m-2">
                <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-dark">{{ $person->name }}</a>
            </h2>
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
        @if ($person->introduction)
            <div class="m-1">
                <span class="text-dark">
                {{ $person->introduction }}
                </span>
            </div>
        @endif
    </div>
</div>
    