<!doctype html>
<html lang="en">
<head>
    @include('_head')
</head>
<body>
    @include('_navbar')
    <div class="container-fluid" style="margin-top: 70px">
        @yield('content')
    </div>
</body>
</html>