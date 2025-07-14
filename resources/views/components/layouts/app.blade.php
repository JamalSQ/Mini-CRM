<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>starting file</title>
</head>
<body>
    <x-layouts.header/>
    <x-layouts.sidebar/>

    {{ $slot }}

</body>
</html>