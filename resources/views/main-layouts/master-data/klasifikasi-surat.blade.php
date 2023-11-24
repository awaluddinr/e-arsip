@extends('layouts.dashboard-layout', ['title' => 'Dashboard'])


@push('css')
    <link href="{{ asset('assets/datatables/datatables') }}/datatables.min.css" rel="stylesheet">

    <style>
    </style>
@endpush

@section('judul', 'Klasifikasi Surat')

@section('main-content')
    <!-- Main content -->
    <section class="content px-2">

        <div class="container-fluid">
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <div class="container mt-2">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    @can('tambah-klasifikasi')
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#modal-klasifikasi"> <i class="fa fa-plus pr-2"></i>Tambah
                                            Klasifikasi Surat</button>
                                    @endcan
                                    {{-- <a href="{{ route('data-user.create') }}" class="btn btn-success">
                                        <i class="fa fa-plus pr-2"></i> Tambah Klasifikasi Surat
                                    </a> --}}
                                </div>

                                <div>
                                    @include('main-layouts.master-data.klasifikasi-component._modal-tambah-klasifikasi')
                                </div>

                            </div>

                            <div class="row mt-5">
                                <div class="col-12">
                                    <div class="data">
                                        <div class="table-responsive">
                                            <table id="example" class="display table-bordered" style="width: 100%">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th style="width: 12.031px">No.</th>
                                                        <th>Nama Klasifikasi</th>
                                                        <th style="width: 175px">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @foreach ($klasifikasis as $klasifikasi)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $klasifikasi->nama }}</td>
                                                            <td>
                                                                @can('edit-klasifikasi')
                                                                    <a href="#" class="btn btn-warning"
                                                                        data-toggle="modal"
                                                                        data-target="#modalEdit{{ $klasifikasi->id }}">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                @endcan
                                                                {{-- <button type="button" class="btn btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#modalHapus{{ $klasifikasi->id }}">
                                                                    <i class="fa fa-trash"></i>
                                                                </button> --}}
                                                                @can('hapus-klasifikasi')
                                                                    <form
                                                                        action="{{ route('klasifikasi.destroy', $klasifikasi->id) }}"
                                                                        method="POST" class="d-inline-block">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <div class="mb-0">
                                                                            <input name="_method" type="hidden" value="DELETE">
                                                                            <button type="submit"
                                                                                class="btn btn-danger btndelete">
                                                                                <i class="fa fa-trash"></i>
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                @endcan
                                                            </td>
                                                        </tr>
                                                        @include('main-layouts.master-data.klasifikasi-component._modal-hapus-klasifikasi')

                                                        @include('main-layouts.master-data.klasifikasi-component._modal-edit-klasifikasi')
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
    <script src="{{ asset('assets/datatables/datatables') }}/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    <script>
        $('.btndelete').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                    title: 'Konfirmasi Hapus Data',
                    text: 'Anda yakin ingin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!'
                })
                .then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        form.submit();
                    }
                })
        });


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
