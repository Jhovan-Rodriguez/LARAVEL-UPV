<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('titulo')</title>
    @vite('resources/css/app.css')
    <!-- font-awesome -->
    <!-- styles -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />

  </head>
  <body>
    @yield('contenido')
  </body>
</html>