@extends('layouts.dashboard-layout', ['title' => 'Dashboard'])




@section('judul', 'Profil')

@section('main-content')
    <!-- Main content -->
    <section class="content px-2">

        <div class="container-fluid">
            <div class="section-body">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-title px-3 pt-3 pb-1">
                                    <h4 class="mb-0">Form Edit Profil</h4>
                                </div>
                                <div class="card-body">
                                    @include('main-layouts.master-data.user-component._form-edit-profil')
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-title px-3 pt-3 pb-1">
                                    <h4 class="mb-0">Form Ubah Password</h4>
                                </div>
                                <div class="card-body">
                                    @include('main-layouts.master-data.user-component._form-ubah-password')
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
