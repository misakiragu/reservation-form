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
    <label for="date">予約日:</label>
    <input type="date" id="reservation_date" name="reservation_date">
    <label for="time">予約時間:</label>
    <input type="time" id="reservation_time" name="reservation_time">
    <label for="people">予約人数:</label>
    <input type="number" id="reservation_number" name="reservation_number" min="1">
    <button type="submit">予約する</button>
</body>

</html>