<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>店舗情報編集</title>
</head>
<body>
    <h1>店舗情報編集</h1>
    <form action="{{ route('shop.update', ['shop_id' => $shop->id]) }}" method="POST">
        @csrf
        <label for="name">店舗名:</label>
        <input type="text" id="name" name="name" value="{{ $shop->name }}" required>
        <br>
        <label for="description">説明:</label>
        <textarea id="description" name="description" required>{{ $shop->description }}</textarea>
        <br>
        <button type="submit">更新</button>
    </form>
    <a href="{{ route('shop.index') }}">戻る</a>
</body>
</html>
