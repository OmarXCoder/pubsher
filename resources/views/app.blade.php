<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <script src="https://kit.fontawesome.com/b8d5e77472.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ mix('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    @inertia
</body>

</html>
