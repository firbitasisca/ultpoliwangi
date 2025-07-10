<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-title-poliwangi.png') }}" />

    @yield('title')

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A premium admin dashboard template by Mannatthemes" name="description" />
    <meta content="Mannatthemes" name="author" />

    @yield('css')

    {{-- Font awesome icon cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- App css -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="{{ asset('template/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="account-body accountbg">

    {{-- alert --}}
    @include('sweetalert::alert')

    @yield('content')

    <!-- jQuery  -->
    <script src="{{ asset('template/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/waves.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/jquery.slimscroll.min.js') }}"></script>

    @yield('script')

    <!-- App js -->
    <script src="{{ asset('template/assets/js/app.js') }}"></script>

</body>

</html>
