<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Graisena - Platform</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Graisena Platform" name="description" />
    <meta content="Graisena" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('assets/css/config/default/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="{{ asset('assets/css/config/default/app.min.css') }}" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <link href="{{ asset('assets/css/config/default/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" />
    <link href="{{ asset('assets/css/config/default/app-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    @stack('styles')

</head>

<body class="loading"
    style="background-image: url('{{ asset('/assets/images/bg-light.png') }}');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: 50%;"
>

    @yield('content')
    <!-- end page -->


    <footer class="footer footer-alt">
        2020 - <script>
            document.write(new Date().getFullYear())
        </script> &copy; Graisana Platform by <a href="idstack.net" class="text-white-50">IDStack</a>
    </footer>

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    @stack('scripts')

</body>

</html>
