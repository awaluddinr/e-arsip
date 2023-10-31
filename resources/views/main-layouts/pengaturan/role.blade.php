@extends('layouts.dashboard-layout', ['title' => 'Dashboard'])


@push('css')
    <link href="{{ asset('assets/datatables/datatables') }}/datatables.min.css" rel="stylesheet">

    <style>
    </style>
@endpush

@section('judul', 'Role')

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
                                    <a href="{{ route('surat-masuk.create') }}" class="btn btn-success">
                                        <i class="fa fa-plus pr-2"></i> Tambah Role
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
                                                        <th>Nama Role</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Petugas</td>
                                                        <td>
                                                            <a href="{{ route('surat-masuk.edit', 'id') }}"
                                                                class="btn btn-warning">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <button type="button" class="btn btn-danger"
                                                                data-toggle="modal" data-target="#modalHapus">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
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
