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
    <title>Livewire</title>
</head>
<body class="flex justify-center">
    <div class="w-10/12 my-10 flex">
        <div class="w-5/12 rounded border p-2">
            <livewire:tickets/>
        </div>
        <div class="w-7/12 mx-2 rounded border p-2">
            <livewire:comments/>
        </div>
    </div>
</body>
</html>
