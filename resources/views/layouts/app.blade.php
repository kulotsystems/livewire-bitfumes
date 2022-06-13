<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}"/>
    <script src="{{ asset('tailwindcss/3.0.24.js') }}"></script>
    <livewire:styles/>
    <livewire:scripts/>
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Livewire</title>
</head>
<body class="flex flex-wrap justify-center">
    <div class="flex w-full justify-left px-4 bg-purple-900 text-white">
        <a class="mx-3 py-4" href="/">Home</a>
        <a class="mx-3 py-4" href="/login">Login</a>
    </div>
    <div class="my-10 flex justify-center">
        {{ $slot }}
    </div>
</body>
</html>
