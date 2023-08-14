<div class="search my-4">
    <form action="{{ route('searchUsers') }}" method="GET"class="search-form">
        @csrf
        <input type="text" name="nickname" class="search-input" placeholder="ユーザー検索" value="{{ $searched_name }}">
        <button type="submit" class="search-button">
            <i class="fas fa-search text-dark"></i>
        </button>
    </form>
</div>