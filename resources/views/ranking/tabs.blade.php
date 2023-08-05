<ul class="nav nav-tabs nav-justified mt-3">
    <li class="nav-item">
        <a class="nav-link text-muted {{ $hasSize ? 'active' : '' }}"
            href="{{ route('ranking.nationwide') }}">
        サイズ
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-muted {{ $hasWeight ? 'active' : '' }}"
            href="{{ route('ranking.nationwideWeight') }}">
        ウェイト
        </a>
    </li>
</ul>