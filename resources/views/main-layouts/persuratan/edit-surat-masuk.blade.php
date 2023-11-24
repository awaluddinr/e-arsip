@extends('layouts.dashboard-layout', ['title' => 'Dashboard'])


@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/component.css') }}">
@endpush

@section('judul', 'Edit Surat Masuk')

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
                                    <a href="{{ route('surat-masuk') }}" class="btn btn-danger rounded-pill">
                                        <i class="fa fa-arrow-circle-left"></i>
                                        Kembali
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    @include('main-layouts.persuratan.surat-masuk-component._form-edit-surat-masuk')
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
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.7.570/build/pdf.min.js"></script>
    <script src="{{ asset('assets/js/custom-file-input.js') }}"></script>
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
