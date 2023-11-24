@extends('layouts.dashboard-layout', ['title' => 'Dashboard'])


@push('css')
    <link href="{{ asset('assets/datatables/datatables') }}/datatables.min.css" rel="stylesheet">

    <style>
    </style>
@endpush

@section('judul', 'Permission')

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
                                    <h3 class="text-center">
                                        Informasi Mengenai Hak Akses Pengguna
                                    </h3>
                                </div>

                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="data">
                                        <div class="table-responsive">
                                            <table id="example" class="display table-bordered" style="width: 100%">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Menu Utama</th>
                                                        <th>Sub Menu</th>
                                                        <th>Akses</th>

                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @foreach ($permissions as $permission)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $permission->menu_utama }}</td>
                                                            <td>
                                                                {{ $permission->sub_menu }}
                                                            </td>
                                                            <td>{{ $permission->hak_akses }}</td>
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
