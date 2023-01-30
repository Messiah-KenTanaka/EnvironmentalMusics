<div class="col-3 mt-5 d-none d-md-block">
    <div class="card form-group sidemenu-fixed p-3">
        <span class="dropdown-item font-weight-bold py-2"><i class="fa-solid fa-tags mr-2"></i>人気のタグ</span>
        <div class="dropdown-divider"></div>
        @foreach($tags as $tag)
            <button class="dropdown-item py-2" type="button"
                onclick="location.href='{{ route('tags.show', ['name' => $tag->name]) }}'">
                {{ Functions::getNameTenEllipsis($tag->name) }}
            </button>
        @endforeach
    </div>
</div>
