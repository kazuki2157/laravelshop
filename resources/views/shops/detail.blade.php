<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $shop['name'] }}の詳細</title>
</head>
<body>
    <h1>{{ $shop['name'] }}</h1>
    <p>{{ $shop['description'] }}</p>
    <a href="{{ route('shop.index') }}">戻る</a>
</body>
</html>
