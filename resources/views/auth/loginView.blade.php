<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/template') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/template') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/template') }}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

    <style>
        body {
            min-height: 582.792px !important;
        }
    </style>
</head>

<body class="hold-transition login-page" style="background-color: rgb(226, 226, 226);">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-header text-center bg-primary">
                <a href="../../index2.html" class="h1"><b>e</b>-Arsip</a>
            </div>
            <div class="card-body">
                <div class="card-icon text-center pb-4">
                    <i class="fa fa-cog text-warning" style="font-size: 40px"></i>
                    <i class="fa fa-envelope text-danger" style="font-size: 70px"></i>
                    <i class="fa fa-save text-success" style="font-size: 40px"></i>
                </div>
                <h4 class="login-box-msg pb-4">Selamat Datang</h4>

                <form action="{{ route('login.proses') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text"
                            class="form-control @error('username')
                        is-invalid
                    @enderror"
                            name="username" placeholder="Username" value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div> --}}
                    </div>
                    <div class="input-group mb-3">
                        <input type="password"
                            class="form-control @error('password')
                            is-invalid
                        @enderror"
                            name="password" placeholder="Password" value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Ingat saya
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html">Lupa Password</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->


    <!-- jQuery -->
    <script src="{{ asset('assets/template') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/template') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/template') }}/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // Periksa apakah ada pesan sukses dalam session flash
            var alert = {!! json_encode(session('status')) !!};

            // Jika ada pesan sukses, tampilkan SweetAlert
            if (alert) {
                Swal.fire({
                    title: alert.title,
                    text: alert.pesan,
                    icon: alert.icon
                });
            }
        });
    </script>
</body>
</body>

</html>
