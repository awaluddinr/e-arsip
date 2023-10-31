@extends('layouts.dashboard-layout', ['title' => 'Dashboard'])


@push('css')
@endpush

@section('judul', 'Edit Surat Keluar')

@section('main-content')
    <!-- Main content -->
    <section class="content px-2">

        <div class="container-fluid">
            <div class="section-body">
                <div class="card">
                    <div class="card-body p-2">
                        <div class="container mt-2">
                            {{-- <a href="javascript:void(0);"
                                onclick="window.open('{{ $pdfUrl }}', 'myWindow', 'width=600,height=800');">Tautan
                                ke Example.com</a>

                            <button class="btn" id="open-pdf-in-new-window">Open PDF in New Window</button> --}}
                            <div class="row">
                                <div class="col-lg-12 mb-4">
                                    <a href="{{ route('surat-keluar') }}" class="btn btn-danger rounded-pill">
                                        <i class="fa fa-arrow-circle-left"></i>
                                        Kembali
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    @include('main-layouts.persuratan.surat-keluar-component._form-edit-surat-keluar')
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
