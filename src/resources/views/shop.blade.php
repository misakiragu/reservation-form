{{-- resources/views/shops/detail.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $shop->name }} Details</title>
</head>

<body>
    <a href="/"> ＜ </a>
    <h1>{{ $shop->name }}</h1>
    @if ($shop->image_url)
    <img src="{{ asset($shop->image_url) }}" alt="{{ $shop->name }}">
    @endif
    <p>#{{ $shop->area->name }}</p>
    <p>#{{ $shop->genre->name }}</p>
    <p>{{ $shop->overview }}</p>
</body>

</html>