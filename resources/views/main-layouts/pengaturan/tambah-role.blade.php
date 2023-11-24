@extends('layouts.dashboard-layout', ['title' => 'Dashboard'])


@push('css')
    <style>
        label {
            font-size: 11px
        }
    </style>
@endpush

@section('judul', 'Tambah Role')

@section('main-content')
    <!-- Main content -->
    <section class="content px-2">

        <div class="container-fluid">
            <div class="section-body">
                <div class="card">
                    <div class="card-body p-2">
                        <div class="container mt-2">
                            <div class="row">
                                <div class="col-lg-12 mb-4">
                                    <a href="{{ route('role') }}" class="btn btn-danger rounded-pill">
                                        <i class="fa fa-arrow-circle-left"></i>
                                        Kembali
                                    </a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="alert bg-warning rounded p-3 ">
                                        <div class="container ">
                                            <h1 class="display-6">Perhatian</h1>
                                            <p class="">Pastikan untuk memilih <u class="font-weight-bold">menu
                                                    utama</u> dan <u class="font-weight-bold">sub menu</u> pada
                                                saat
                                                pengisian hak akses user. <u class="font-weight-bold">Contoh</u> pada saat
                                                memilih hak akses
                                                (
                                                <small class="my-auto">
                                                    <input type="checkbox"> <u class="font-weight-bold">tambah-role</u>
                                                </small>
                                                )
                                                dan
                                                (
                                                <small>
                                                    <input type="checkbox"> <u class="font-weight-bold">edit-role</u>
                                                </small>
                                                ) pastikan untuk memilih juga (
                                                <small>
                                                    <input type="checkbox"> <u class="font-weight-bold">pengaturan menu</u>
                                                </small>
                                                ) sebagai menu utama dan
                                                (
                                                <small>
                                                    <input type="checkbox"> <u class="font-weight-bold">role menu</u>
                                                </small>
                                                ) sebagai sub menu. Untuk informasi hak-akses dapat diakses pada halaman <a
                                                    href="{{ route('permission') }}"
                                                    class="text-dark font-weight-bold"><u>berikut</u></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    @include('main-layouts.pengaturan.role-component._form-tambah-role')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('js')
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
@endpush
