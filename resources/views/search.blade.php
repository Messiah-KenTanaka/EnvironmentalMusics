<div class="d-flex justify-content-center">
    <form action="{{ route('search.show') }}" method="POST">
        @csrf
        <input type="text" name="keyword" placeholder="検索キーワード">
        <button class="dusty-grass-gradient" type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>