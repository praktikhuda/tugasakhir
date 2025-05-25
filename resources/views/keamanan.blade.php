<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keamanan</title>
</head>

<body>
    <h1>Pengaturan Keamanan</h1>
    <form method="POST" action="/keamanan/update">
        @csrf
        <p>Status saat ini: <strong>{{ $status }}</strong></p>
        <button type="submit" name="status" value="on" {{ $status === 'on' ? 'disabled' : '' }}>ON</button>
        <button type="submit" name="status" value="off" {{ $status === 'off' ? 'disabled' : '' }}>OFF</button>
    </form>
</body>

</html>