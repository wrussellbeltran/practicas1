<!DOCTYPE html>
<html lang="es">
<head>
    <title>Probando Laravel - @yield('title')</title>
</head>
<body>
    @section('header')
        Master Header
    @show

    <div class="container">
        @yield('content')
    </div>

    @section('footer')
        Master Footer
    @show

</body>
</html>
