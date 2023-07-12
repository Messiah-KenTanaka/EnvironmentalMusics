<div class="search my-4">
    <form action="{{ route('search.show') }}" method="GET"class="search-form">
        @csrf
        <input type="text" name="keyword" class="search-input" placeholder="キーワード検索">
        <button type="submit" class="search-button">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>