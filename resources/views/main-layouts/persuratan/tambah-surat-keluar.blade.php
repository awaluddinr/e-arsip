@extends('layouts.dashboard-layout', ['title' => 'Dashboard'])

@section('judul', 'Tambah Surat Keluar')

@section('main-content')
    <!-- Main content -->
    <section class="content px-2">

        <div class="container-fluid">
            <div class="section-body">
                <div class="card">
                    <div class="card-body p-2">
                        <div class="container mt-2">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <a href="{{ route('surat-keluar') }}" class="btn btn-danger rounded-pill">
                                        <i class="fa fa-arrow-circle-left"></i>
                                        Kembali
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    @include('main-layouts.persuratan.surat-keluar-component._form-tambah-surat-keluar')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
