<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet"
        href="{{ asset('assets/template') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/template') }}/dist/css/adminlte.min.css" />

    <title>Print Pdf</title>


    <style type="text/css">
        th {
            font-size: 13px;
            border-top: 1px solid black !important;
            border-bottom: 1px solid black !important;
        }

        td {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="title mt-5 mb-2">
                    <h2 class="text-center">Laporan Surat Keluar
                        @if ($decodedFilter == 'today')
                            Hari Ini
                        @elseif($decodedFilter == 'yesterday')
                            Hari Sebelumnya
                        @elseif($decodedFilter == 'this_week')
                            Minggu Ini
                        @elseif($decodedFilter == 'last_week')
                            Minggu Lalu
                        @elseif($decodedFilter == 'this_month')
                            Bulan Ini
                        @elseif($decodedFilter == 'last_month')
                            Bulan Lalu
                        @elseif($decodedFilter == 'this_year')
                            Tahun Ini
                        @elseif($decodedFilter == 'last_year')
                            Tahun Lalu
                        @else
                        @endif
                    </h2>
                </div>
                <table class="table mt-4" border="1">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>No. Agenda</th>
                            <th>No. Surat</th>
                            <th>Tujuan Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Klasifikasi Surat</th>
                            <th>Perihal Surat</th>
                            <th>Diunggah Oleh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($surat) == 0)
                            <tr class="text-center">
                                <td colspan="9" class="font-weight-bold text-danger">
                                    <h5 class="mb-0">Tidak Ada Data Surat Keluar</h5>
                                </td>
                            </tr>
                        @else
                            @foreach ($surat as $data)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->no_agenda }}</td>
                                    <td>{{ $data->no_surat }}</td>
                                    <td>{{ $data->tujuan_surat }}</td>
                                    <td>
                                        {{ $data->tanggal_surat }}
                                    </td>
                                    <td>
                                        {{ $data->klasifikasis->nama }}
                                    </td>
                                    <td>{{ $data->perihal_surat }}</td>
                                    <td>{{ $data->user->name }}</td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets/template') }}/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/template') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/template') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets/template') }}/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('assets/template') }}/dist/js/demo.js"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('assets/template') }}/dist/js/pages/dashboard.js"></script>
    <script>
        window.print();
    </script>

</body>

</html>
