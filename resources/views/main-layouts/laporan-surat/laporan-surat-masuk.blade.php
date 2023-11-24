@extends('layouts.dashboard-layout', ['title' => 'Dashboard'])


@push('css')
    <link href="{{ asset('assets/datatables/datatables') }}/datatables.min.css" rel="stylesheet">

    <style>
        thead th {
            font-size: 13px;
        }

        tbody td {
            font-size: 12px;
        }
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
                            <div class="row py-2">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="filter_date">Filter Data Berdasarkan Tanggal Surat :</label>
                                        <form action="{{ route('laporan-surat-masuk') }}" method="get">
                                            <div class="input-group">
                                                <select class="form-control" name="filter" id="filterSelect">
                                                    <option value="all_data" {{ $filter == 'all_data' ? 'selected' : '' }}>
                                                        Semua Data</option>
                                                    <option value="today" {{ $filter == 'today' ? 'selected' : '' }}>Hari
                                                        Ini</option>
                                                    <option value="yesterday"
                                                        {{ $filter == 'yesterday' ? 'selected' : '' }}>Kemarin</option>
                                                    <option value="this_week"
                                                        {{ $filter == 'this_week' ? 'selected' : '' }}>Minggu Ini</option>
                                                    <option value="last_week"
                                                        {{ $filter == 'last_week' ? 'selected' : '' }}>Minggu Lalu</option>
                                                    <option value="this_month"
                                                        {{ $filter == 'this_month' ? 'selected' : '' }}>Bulan Ini</option>
                                                    <option value="last_month"
                                                        {{ $filter == 'last_month' ? 'selected' : '' }}>Bulan Lalu</option>
                                                    <option value="this_year"
                                                        {{ $filter == 'this_year' ? 'selected' : '' }}>Tahun Ini</option>
                                                    <option value="last_year"
                                                        {{ $filter == 'last_year' ? 'selected' : '' }}>Tahun lalu</option>
                                                </select>
                                                <input type="hidden" name="print_filter" id="selectedFilter"
                                                    value="{{ $filter }}">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit">Cari</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                                                <a target="_blank" class="btn btn-info" id="export">
                                                    <i class="fa fa-print pr-2"></i>Cetak Laporan
                                                </a>
                                            </div>
                                            <table id="example" class="display table-bordered" style="width: 100%">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>No. Surat</th>
                                                        <th>Asal Surat</th>
                                                        <th>Tanggal Surat</th>
                                                        <th>Klasifikasi</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @foreach ($surat as $data)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $data->no_surat }}</td>
                                                            <td>{{ $data->asal_surat }}</td>
                                                            <td>
                                                                {{ $data->tanggal_surat }}
                                                            </td>
                                                            <td>
                                                                {{ $data->klasifikasis->nama }}
                                                            </td>
                                                            <td>
                                                                <iframe class="d-none" id="textfile{{ $data->id }}"
                                                                    src="{{ route('surat-masuk.lihat', $data->id) }}"
                                                                    frameborder="0">
                                                                </iframe>
                                                                <button class="btn btn-warning"
                                                                    onclick="print({{ $data->id }})">
                                                                    <i class="fa fa-print"></i>
                                                                </button>
                                                                <a href="{{ route('surat-masuk.download', $data->id) }}"
                                                                    class="btn btn-info">
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                            </td>
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
    <script>
        function print(fileId) {
            console.log(fileId)
            var iframe = document.getElementById('textfile' + fileId);

            // Menggunakan parameter fileId dalam fungsi print
            iframe.contentWindow.print();

            // iframe.contentWindow.print();
        }
    </script>

    <script>
        // Ambil elemen select
        var filterSelect = document.getElementById('filterSelect');
        var selectedFilterInput = document.getElementById('selectedFilter');
        // Ambil elemen a dengan id 'export'
        var exportLink = document.getElementById('export');

        selectedFilterInput.value = filterSelect.value;
        updateExportLinkHref();

        // Tambahkan event listener untuk perubahan pada elemen select
        filterSelect.addEventListener('change', function() {
            // Perbarui nilai href pada elemen a berdasarkan nilai yang dipilih pada select
            selectedFilterInput.value = this.value;

            // Perbarui href pada elemen a
            updateExportLinkHref();
        });

        function updateExportLinkHref() {
            // exportLink.href = "{{ route('print-masuk.view', ['print' => ':filter']) }}".replace(':filter', selectedFilterInput
            //     .value);

            // link di enkripsi
            exportLink.href = "{{ route('print-masuk.view', ['print' => ':filter']) }}".replace(':filter',
                encodeURIComponent(
                    btoa(selectedFilterInput.value)));
        }
    </script>
@endpush
