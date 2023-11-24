<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-Arsip | {{ $title }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/template') }}/plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets/template') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/template') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/template') }}/plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/template') }}/dist/css/adminlte.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{ asset('assets/template') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/template') }}/plugins/daterangepicker/daterangepicker.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/template') }}/plugins/summernote/summernote-bs4.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

    <script>
        // penting sekalinya
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <style>
        /* @media print {

            html,
            body {
                display: none
            }
        } */

        body #icon {
            display: none
        }
    </style>

    @stack('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <x-navbar>
        </x-navbar>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <x-sidebar></x-sidebar>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div>
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>@yield('judul')</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                @yield('main-content')
            </div>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- footer -->
        <x-footer></x-footer>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    {{-- <script src="{{ asset('assets/template') }}/plugins/jquery/jquery.min.js"></script> --}}
    <!-- Bootstrap 4 -->
    {{-- <script src="{{ asset('assets/template') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
    <!-- AdminLTE App -->
    {{-- <script src="{{ asset('assets/template') }}/dist/js/adminlte.min.js"></script> --}}
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('assets/template') }}/dist/js/demo.js"></script> --}}

    <script src="{{ asset('assets/template') }}/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/template') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/template') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ asset('assets/template') }}/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ asset('assets/template') }}/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="{{ asset('assets/template') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{ asset('assets/template') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('assets/template') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('assets/template') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('assets/template') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/template') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('assets/template') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/template') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/template') }}/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('assets/template') }}/dist/js/demo.js"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('assets/template') }}/dist/js/pages/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.btnlogout').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                    title: 'Konfirmasi Keluar Aplikasi',
                    text: 'Anda yakin ingin keluar dari Aplikasi?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Keluar!'
                })
                .then((willlogout) => {
                    if (willlogout.isConfirmed) {
                        form.submit();
                    }
                })
        });
    </script>

    @stack('js')
</body>

</html>
