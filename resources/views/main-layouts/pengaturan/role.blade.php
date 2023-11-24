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
                                    @can('tambah-role')
                                        <a href="{{ route('role.create') }}" class="btn btn-success">
                                            <i class="fa fa-plus pr-2"></i> Tambah Role
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
                                                        <th>Nama Role</th>
                                                        <th>Jumlah Hak Akses</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @foreach ($roles as $role)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $role->name }}</td>
                                                            <td>
                                                                <button class="btn btn-sm bg-purple">
                                                                    {{ count($role->permissions) }}
                                                                </button>

                                                            </td>
                                                            <td>
                                                                @can('detail-role')
                                                                    <a href="#" class="btn btn-info btn-open-modal"
                                                                        data-toggle="modal"
                                                                        data-target="#modalDetailRole{{ $role->id }}"
                                                                        data-role-id="{{ $role->id }}">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                @endcan
                                                                @can('edit-role')
                                                                    <a href="{{ route('role.edit', $role->id) }}"
                                                                        class="btn btn-warning">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                @endcan
                                                                @can('hapus-role')
                                                                    {{-- <button type="button" class="btn btn-danger"
                                                                        data-toggle="modal"
                                                                        data-target="#modalHapusRole{{ $role->id }}">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button> --}}
                                                                    <form action="{{ route('role.destroy', $role->id) }}"
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
                                                        @include('main-layouts.pengaturan.role-component._modal-hapus-role')

                                                        @include('main-layouts.pengaturan.role-component._modal-detail-role')
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
        document.addEventListener('DOMContentLoaded', function() {
            const openModalButtons = document.querySelectorAll('.btn-open-modal');

            openModalButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const roleId = this.getAttribute('data-role-id');
                    const modalId = this.getAttribute('data-target');
                    const modal = document.getElementById(modalId);
                    const roleDetailContent = document.getElementById(`roleDetailContent${roleId}`);

                    // Kirim permintaan Ajax untuk mendapatkan data detail role dan permission
                    fetch(`/role/${roleId}`)
                        .then(response => response.json())
                        .then(data => {
                            // Tampilkan data detail role dan permission di dalam modal
                            roleDetailContent.innerHTML = `
                            <div class="row">
                                <div class="col-lg-12 px-2">
                                    <h4 class="px-3"> Hak Akses ${data.role.name}</h4>
                                    <ol>
                                        ${data.permissions.map(permission => `<li>${permission.name}</li>`).join('')}
                                    </ol>
                                </div>

                                <!-- Tambahkan dua kolom lagi sesuai kebutuhan -->
                                <div class="col-lg-4">
                                    <!-- Konten untuk kolom kedua -->
                                </div>

                                <div class="col-lg-4">
                                    <!-- Konten untuk kolom ketiga -->
                                </div>
                            </div>`;

                            // Buka modal
                            modal.style.display = 'block';
                        })
                        .catch(error => console.error('Error:', error));
                });
            });

            // Tutup modal jika diklik di luar area kontennya
            window.onclick = function(event) {
                openModalButtons.forEach(button => {
                    const modalId = button.getAttribute('data-target');
                    const modal = document.getElementById(modalId);
                    if (event.target === modal) {
                        modal.style.display = 'none';
                    }
                });
            };
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
