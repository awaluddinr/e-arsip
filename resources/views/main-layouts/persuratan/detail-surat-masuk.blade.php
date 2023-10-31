@extends('layouts.dashboard-layout', ['title' => 'Dashboard'])


@push('css')
    <style>
        label {
            font-size: 14px;
        }

        .table-data td,
        .table-head th {
            text-align: center
        }
    </style>
@endpush

@section('judul', 'Detail Surat Masuk')

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
                                    <a href="{{ route('surat-masuk') }}" class="btn btn-danger rounded-pill">
                                        <i class="fa fa-arrow-circle-left"></i>
                                        Kembali
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <table class="col-6">
                                    <tr>
                                        <td>
                                            <label for="nomor" class="my-auto pl-3 pr-5">No. Agenda</label>
                                        </td>
                                        <td>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend border">
                                                    <i class="fas fa-list my-auto px-2"></i>
                                                </div>
                                                <input type="text" class="form-control" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1" disabled value="soon">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="nomor" class="my-auto pl-3 pr-5">Asal Surat</label>
                                        </td>
                                        <td>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend border">
                                                    <i class="fas fa-globe my-auto px-2"></i>
                                                </div>
                                                <input type="text" class="form-control" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1" disabled value="soon">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="nomor" class="my-auto pl-3 pr-5">Tanggal Surat</label>
                                        </td>
                                        <td>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend border">
                                                    <i class="fas fa-calendar my-auto px-2"></i>
                                                </div>
                                                <input type="text" class="form-control" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1" disabled value="soon">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <table class="col-6">
                                    <tr>
                                        <td>
                                            <label for="nomor" class="my-auto px-5">No. Surat</label>
                                        </td>
                                        <td>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend border">
                                                    <i class="fas fa-list-ol my-auto px-2"></i>
                                                </div>
                                                <input type="text" class="form-control" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1" disabled value="soon">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="nomor" class="my-auto px-5">Klasifikasi Surat</label>
                                        </td>
                                        <td>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend border">
                                                    <i class="fas fa-book my-auto px-2"></i>
                                                </div>
                                                <input type="text" class="form-control" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1" disabled value="soon">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="nomor" class="my-auto px-5">Keterangan Surat</label>
                                        </td>
                                        <td>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend border">
                                                    <i class="fas fa-info-circle my-auto px-2"></i>
                                                </div>
                                                <input type="text" class="form-control" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1" disabled value="soon">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="table-head">
                                                <th style="width: 10px">No</th>
                                                <th>Nama Berkas</th>
                                                <th>Diunggah Oleh</th>
                                                <th>Ukuran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table-data">
                                                <td>1.</td>
                                                <td>undangan.pdf</td>
                                                <td>
                                                    trisno23
                                                </td>
                                                <td>1.56 MB</td>
                                                <td>
                                                    <a href="" class="btn btn-success">
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

    </section>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.7.570/build/pdf.min.js"></script>
@endpush
