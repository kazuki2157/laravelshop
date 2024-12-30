<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新規店舗登録</title>
</head>
<body>
    <h1>新規店舗登録</h1>
    <form action="{{ route('shop.store') }}" method="POST">
        @csrf
        <label for="name">店舗名:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="description">説明:</label>
        <textarea id="description" name="description" required></textarea>
        <br>
        <button type="submit">登録</button>
    </form>
</body>
</html>
