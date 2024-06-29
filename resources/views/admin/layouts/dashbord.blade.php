<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.includes.head')
        
    </head>

    <body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
        <div class="wrapper">
            @include('admin.includes.header')
            @include('admin.includes.sidebar')
            @yield('content')
            @include('admin.includes.footer')
        </div>
    </body>
    
</html>
