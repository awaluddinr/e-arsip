@extends('layouts.dashboard-layout', ['title' => 'Dashboard'])

@section('judul', 'Dashboard')

@section('main-content')
    <!-- Main content -->
    <section class="content px-2">

        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ optional($surat_masuk)->count() ?? 0 }}</h3>

                            <p>Surat Masuk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-email"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ optional($surat_keluar)->count() ?? 0 }}</h3>

                            <p> Surat Keluar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-drafts"></i>
                        </div>
                    </div>
                </div>


                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ optional($count_user)->count() ?? 0 }}</h3>

                            <p>Daftar User</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>

                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ optional($klasifikasi)->count() ?? 0 }}</h3>

                            <p>Klasifikasi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-list"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <!-- /.row -->
        </div>

    </section>
@endsection
