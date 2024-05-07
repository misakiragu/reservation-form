{{-- resources/views/shops/detail.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $shop->name }} Details</title>
</head>

<body>
    <h1>{{ $shop->name }}</h1>
    <p>{{ $shop->address }}</p>
    <p>{{ $shop->genre }}</p>
    <p>{{ $shop->overview }}</p>
    @if ($shop->image_url)
    <img src="{{ asset($shop->image_url) }}" alt="{{ $shop->name }}">
    @endif
</body>

</html>