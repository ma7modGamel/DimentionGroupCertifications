<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.includes.head')
    </head>
    <body class="body">
        <div class="elementor-background-overlay"></div>
        @yield('content')
        <div class="hold-transition login-page">
        </div>
    </body>
</html>

