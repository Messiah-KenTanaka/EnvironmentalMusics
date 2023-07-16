<ul class="nav nav-tabs nav-justified mt-3">
    <li class="nav-item">
        <a class="nav-link text-muted {{ $hasSize ? 'active' : '' }}"
            href="{{ route('ranking.field', ['field' => $field]) }}">
        サイズ
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-muted {{ $hasWeight ? 'active' : '' }}"
            href="{{ route('ranking.fieldWeight', ['field' => $field]) }}">
        ウェイト
        </a>
    </li>
</ul>