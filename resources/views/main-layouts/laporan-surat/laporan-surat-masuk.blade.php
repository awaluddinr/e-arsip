@extends('layouts.dashboard-layout', ['title' => 'Dashboard'])


@push('css')
    <link href="{{ asset('assets/datatables/datatables') }}/datatables.min.css" rel="stylesheet">

    <style>
    </style>
@endpush

@section('judul', ' Laporan Surat Masuk')

@section('main-content')
    <!-- Main content -->
    <section class="content px-2">

        <div class="container-fluid">
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <div class="container mt-2">
                            <form action="">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="date" class="mb-0">Tanggal Awal</label>
                                            <input type="date" class="form-control" id="date" placeholder="date">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="date" class="mb-0">Tanggal Akhir</label>
                                            <input type="date" class="form-control" id="date" placeholder="date">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 my-auto">
                                        <div class="form-group my-auto">
                                            <button class="btn btn-danger">
                                                <i class="fa fa-filter"></i> Filter Data
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="container mt-2">

                            <div class="row mt-5">
                                <div class="col-12">
                                    <div class="data">
                                        <div class="table-responsive">
                                            <div class="cetak d-flex justify-content-end mb-4">
                                                <button class="btn btn-info">
                                                    <i class="fa fa-print pr-2"></i>Cetak Laporan
                                                </button>
                                            </div>
                                            <table id="example" class="display table-bordered" style="width: 100%">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>No. Surat</th>
                                                        <th>Asal Surat</th>
                                                        <th>Tanggal Surat</th>
                                                        <th>Keterangan Surat</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <tr>
                                                        <td>1</td>
                                                        <td>001</td>
                                                        <td>Kendari</td>
                                                        <td>
                                                            22-07-2023
                                                        </td>
                                                        <td>Undangan</td>
                                                        <td>
                                                            <a href="{{ route('surat-keluar.detail', 'id') }}"
                                                                class="btn btn-info">
                                                                <i class="fa fa-print"></i>
                                                            </a>
                                                            <a href="{{ route('surat-keluar.edit', 'id') }}"
                                                                class="btn btn-warning">
                                                                <i class="fa fa-download"></i>
                                                            </a>
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
