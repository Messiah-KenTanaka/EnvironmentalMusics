<ul class="nav nav-tabs nav-justified mt-3">
    <li class="nav-item">
        <a class="nav-link text-muted {{ $hasSize ? 'active' : '' }}"
            href="{{ route('ranking.pref', ['pref' => $pref]) }}">
        サイズ
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-muted {{ $hasWeight ? 'active' : '' }}"
            href="{{ route('ranking.prefWeight', ['pref' => $pref]) }}">
        ウェイト
        </a>
    </li>
</ul>