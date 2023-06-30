<div class="card mt-3">
    <div class="card-body">
        <div class="d-flex flex-row">
            <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-dark">
            @if ($person->image)
                <img src="{{ $person->image }}" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
            @else
                <img src="{{ asset('images/noimage01.png')}}" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
            @endif
            </a>
        </div>
        <h2 class="h5 card-title m-0">
            <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-dark">{{ $person->name }}</a>
        </h2>
    </div>
</div>
    