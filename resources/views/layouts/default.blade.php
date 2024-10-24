<!DOCTYPE html>
<html lang="@lang('sv')">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? ""  }}Angie Admin</title>
        @vite([
                'resources/css/app.css',
                'resources/js/app.js'
            ]
        )
    </head>
    <body>
        @yield('content')
        @yield('scripts')
    </body>
</html>
