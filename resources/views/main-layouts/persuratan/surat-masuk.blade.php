@extends('layouts.dashboard-layout', ['title' => 'Dashboard'])


@push('css')
    <link href="{{ asset('assets/datatables/datatables') }}/datatables.min.css" rel="stylesheet">


    <style>
        #icon {
            display: none !important;
        }
    </style>
@endpush

@section('judul', 'Surat Masuk')

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
                                    @can('tambah-surat-masuk')
                                        <a href="{{ route('surat-masuk.create') }}" class="btn btn-success">
                                            <i class="fa fa-plus pr-2"></i> Tambah Surat Masuk
                                        </a>
                                    @endcan
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
                                                        <th>No. Agenda</th>
                                                        <th>Asal Surat</th>
                                                        <th>Tanggal Surat</th>
                                                        <th>Klasifikasi Surat</th>
                                                        <th>Diunggah oleh</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @foreach ($user as $mail)
                                                        <tr>
                                                            <input type="hidden" class="delete_id"
                                                                value="{{ $mail->id }}">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $mail['no_agenda'] }}</td>
                                                            <td>{{ $mail->asal_surat }}</td>
                                                            <td>
                                                                {{ \Carbon\Carbon::create($mail['tanggal_surat'])->format('d F Y') }}
                                                            </td>
                                                            <td>
                                                                {{ $mail->klasifikasis->nama }}
                                                            </td>
                                                            <td>
                                                                {{ $mail->user->name }}
                                                            </td>
                                                            <td>
                                                                @can('detail-surat-masuk')
                                                                    <a href="{{ route('surat-masuk.detail', $mail->id) }}"
                                                                        class="btn btn-info">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                @endcan
                                                                @can('edit-surat-masuk')
                                                                    <a href="{{ route('surat-masuk.edit', $mail->id) }}"
                                                                        class="btn btn-warning">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                @endcan
                                                                @can('hapus-surat-masuk')
                                                                    {{-- <button type="button" class="btn btn-danger"
                                                                        data-toggle="modal"
                                                                        data-target="#modalHapus{{ $mail->id }}">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button> --}}
                                                                    <form
                                                                        action="{{ route('surat-masuk.destroy', $mail->id) }}"
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
                                                        @include('main-layouts.persuratan.surat-masuk-component._modal-hapus-surat-masuk')
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
