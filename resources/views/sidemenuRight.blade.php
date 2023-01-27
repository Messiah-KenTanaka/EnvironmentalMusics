<div class="col-3 mt-5 d-none d-md-block">
    <div class="form-group sidemenu-fixed">
        <span class="dropdown-item font-weight-bold py-2">人気のタグ</span>
        <div class="dropdown-divider"></div>
        @foreach($tags as $tag)
            <button class="dropdown-item py-2" type="button"
                onclick="location.href='{{ route('tags.show', ['name' => $tag->name]) }}'">
                {{ Functions::getNameTenEllipsis($tag->name) }}
            </button>
            <div class="dropdown-divider"></div>
        @endforeach
    </div>
</div>
