<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel/Livewire TODOs</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    @livewireStyles
</head>
<body>
    <div class="flex text-center content-center h-screen justify-center">
        @yield('content')
    </div>

    @livewireScripts
</body>
</html>
