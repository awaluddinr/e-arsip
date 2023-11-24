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

        .form-control {
            font-size: 13px
        }

        td {
            font-size: 15px
        }

        thead th {
            font-size: 14px;
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
                                                    aria-describedby="button-addon1" disabled
                                                    value="{{ $surat->no_agenda }}">
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
                                                    aria-describedby="button-addon1" disabled
                                                    value="{{ $surat->asal_surat }}">
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
                                                    aria-describedby="button-addon1" disabled
                                                    value="{{ \Carbon\Carbon::create($surat->tanggal_surat)->format('d F Y') }}">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="nomor" class="my-auto pl-3 pr-5">Tanggal Diterima</label>
                                        </td>
                                        <td>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend border">
                                                    <i class="fas fa-calendar my-auto px-2"></i>
                                                </div>
                                                <input type="text" class="form-control" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1" disabled
                                                    value="{{ \Carbon\Carbon::create($surat->tanggal_diterima_surat)->format('d F Y') }}">
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
                                                    aria-describedby="button-addon1" disabled
                                                    value="{{ $surat->no_surat }}">
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
                                                    aria-describedby="button-addon1" disabled
                                                    value="{{ $surat->klasifikasis->nama }}">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="nomor" class="my-auto px-5">Perihal Surat</label>
                                        </td>
                                        <td>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend border">
                                                    <i class="fas fa-info-circle my-auto px-2"></i>
                                                </div>
                                                <input type="text" class="form-control" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1" disabled
                                                    value="{{ $surat->perihal_surat }}">
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
                                                <td>{{ $surat->file_surat }}</td>
                                                <td>
                                                    {{ $surat->user->name }}
                                                </td>
                                                <td>{{ $hasil }}</td>
                                                <td>
                                                    <a href="javascript:void(0);"
                                                        onclick="window.open('{{ route('surat-masuk.lihat', $surat->id) }}', 'myWindow', 'width=600,height=800');"
                                                        class="btn btn-sm btn-info">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('surat-masuk.download', $surat->id) }}"
                                                        class="btn btn-sm btn-success">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                    <iframe class="d-none" id="textfile"
                                                        src="{{ route('surat-masuk.lihat', $surat->id) }}"
                                                        frameborder="0">
                                                    </iframe>
                                                    <button class="btn btn-sm btn-warning" onclick="print()">
                                                        <i class="fa fa-print"></i>
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

        {{-- <iframe src="{{ route('surat-masuk.download', $surat->id) }}" frameborder="0"></iframe> --}}

    </section>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.7.570/build/pdf.min.js"></script>
    <script>
        function print() {
            var iframe = document.getElementById('textfile');
            iframe.contentWindow.print();
        }
    </script>
@endpush
