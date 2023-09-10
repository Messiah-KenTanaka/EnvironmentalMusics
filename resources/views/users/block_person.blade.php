<div class="border-bottom">
    <div class="p-2">
        <div class="d-flex flex-row align-items-center">
            <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-dark">
            @if ($person->image)
                <img src="{{ $person->image }}" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
            @else
                <img src="{{ asset('images/noimage02.jpg')}}" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
            @endif
            </a>
            <h2 class="h6 card-title font-weight-bold m-2">
                <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-dark">{{ $person->nickname }}</a>
            </h2>
        </div>
    </div>
</div>
    