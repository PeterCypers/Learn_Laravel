<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{ $test }}</h1>
    <p>{!! $test !!}</p>
    <ul>
        @foreach (['dit', 'dat'] as $word)
            <li>{{ $word }}</li>
        @endforeach
    </ul>

    <a href="{{ route('dashboard') }}">Dashboard</a>

    @livewire()
</body>
</html>
