@extends('layouts.dashboard-layout', ['title' => 'Dashboard'])


@push('css')
    <style>
        label {
            font-size: 12px
        }
    </style>
@endpush

@section('judul', 'Edit Role')

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
                            <div class="row">
                                <div class="col-12">
                                    @include('main-layouts.pengaturan.role-component._form-edit-role')
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
