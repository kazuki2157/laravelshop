<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>飲食店一覧</title>
</head>
<body>
    <h1>飲食店一覧ページ</h1>
    <a href="{{ route('shop.create') }}">新規店舗登録</a>

    <!-- 検索フォーム -->
    <form action="{{ route('shop.index') }}" method="GET">
        <input type="text" name="search" placeholder="店舗名や説明で検索" value="{{ request()->search }}">
        <button type="submit">検索</button>
    </form>

    <!-- ソートリンク -->
    <div>
        <a href="{{ route('shop.index', ['sort_by' => 'name', 'sort_order' => 'asc']) }}">店舗名（昇順）</a>
        <a href="{{ route('shop.index', ['sort_by' => 'name', 'sort_order' => 'desc']) }}">店舗名（降順）</a>
    </div>

    <!-- 店舗の一覧表示 -->
    <ul>
        @foreach ($shops as $shop)
            <li>
                <a href="{{ route('shop.detail', ['shop_id' => $shop->id]) }}">
                    {{ $shop->name }}
                </a>
                <p>{{ $shop->description }}</p>
                <a href="{{ route('shop.edit', ['shop_id' => $shop->id]) }}">編集</a>
                <form action="{{ route('shop.destroy', ['shop_id' => $shop->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" onclick="return confirm('本当に削除しますか？');">削除</button>
                </form>
            </li>
        @endforeach
    </ul>

    <!-- ページネーションリンク -->
    <div>
        {{ $shops->links() }}
    </div>
</body>
</html>
