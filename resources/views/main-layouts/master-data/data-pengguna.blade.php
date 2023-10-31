@extends('layouts.dashboard-layout', ['title' => 'Dashboard'])


@push('css')
    <link href="{{ asset('assets/datatables/datatables') }}/datatables.min.css" rel="stylesheet">

    <style>
    </style>
@endpush

@section('judul', 'Data Pengguna')

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
                                    {{-- <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#modal-default"> <i class="fa fa-plus pr-2"></i>Tambah
                                        User</button> --}}
                                    <a href="{{ route('data-user.create') }}" class="btn btn-success">
                                        <i class="fa fa-plus pr-2"></i> Tambah User
                                    </a>
                                </div>

                                <div>
                                    @include('main-layouts.master-data.user-component._modal-tambah-user')
                                </div>

                            </div>

                            <div class="row mt-5">
                                <div class="col-12">
                                    <div class="data">
                                        <div class="table-responsive">
                                            <table id="example" class="display table-bordered" style="width: 100%">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Username</th>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Hak Akses</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @foreach ($data as $dt)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $dt['username'] }}</td>
                                                            <td>{{ $dt['nama'] }}</td>
                                                            <td>
                                                                {{ $dt['email'] }}
                                                            </td>
                                                            <td>{{ $dt['hak-akses'] }}</td>
                                                            <td>
                                                                <a href="{{ route('data-user.edit', $dt['id']) }}"
                                                                    class="btn btn-warning">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <button type="button" class="btn btn-danger"
                                                                    data-toggle="modal" data-target="#modalHapus">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </td>

                                                            @include('main-layouts.master-data.user-component._modal-hapus-user')
                                                        </tr>
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
@endpush
