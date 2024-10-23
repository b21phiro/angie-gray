<!DOCTYPE html>
<html lang="@lang('sv')">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') | Angie Gray Admin</title>
        @vite([
                'resources/css/app.css',
                'resources/js/app.js'
            ]
        )
    </head>
    <body>
        @yield('content')
    </body>
</html>
