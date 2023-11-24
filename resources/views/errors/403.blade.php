@extends('layouts.dashboard-layout', ['title' => 'Dashboard'])




@section('judul', '')

@section('main-content')
    <!-- Main content -->
    <section class="content px-2">

        <div class="container-fluid">
            <div class="section-body">

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <section class="content">
                                <div class="mb-0 text-center">
                                    <h2 class="headline text-warning" style="font-size: 134px"> 403</h2>

                                    <div class="error-content">
                                        <h3>
                                            <i class="fas fa-exclamation-triangle text-warning"></i> Anda Tidak Punya Akses
                                            Kehalaman Ini
                                        </h3>

                                        <p>
                                            Akses anda ditolak
                                            <a href="{{ route('home') }}">kembali ke dashboard</a>
                                        </p>
                                    </div>
                                    <!-- /.error-content -->
                                </div>
                                <!-- /.error-page -->
                            </section>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
