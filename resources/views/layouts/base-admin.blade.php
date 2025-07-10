<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-title-poliwangi.png') }}" />

    @yield('title')

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A premium admin dashboard template by Mannatthemes" name="description" />
    <meta content="Mannatthemes" name="author" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    @yield('css')

    {{-- Font awesome icon cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- DataTables -->
    <link href="{{ asset('template/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('template/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('template/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <link href="{{ asset('template/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- App css -->
    <link href="{{ asset('template/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

    {{-- alert --}}
    @include('sweetalert::alert')


    @include('layouts.partials.admin.navbar-admin')

    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">

                @yield('content')

            </div><!-- container -->
        </div>

    </div>
    <!-- end page-wrapper -->

    <!-- jQuery  -->
    <script src="{{ asset('template/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/waves.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('template/assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('template/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

    {{-- Datatable --}}
    <script src="{{ asset('template/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('template/assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template/assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/assets/pages/jquery.datatable.init.js') }}"></script>

    <script src="{{ asset('template/assets/pages/jquery.hospital_dashboard.init.js') }}"></script>

    @yield('script')

    <!-- App js -->
    <script src="{{ asset('template/assets/js/app.js') }}"></script>

</body>

</html>
