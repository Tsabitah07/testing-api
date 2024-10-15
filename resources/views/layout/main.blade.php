<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body style="margin: 0; padding: 0">
<div style="display: flex; max-width: 100vw; max-height: 100vh; padding: 0; margin: 0">
    @include('layout.sidebar')

    @yield('container')
</div>
</body>
</html>
