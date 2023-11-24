<form action="{{ route('surat-keluar.update', $surat->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group mb-3">
                <label for="agenda" class="mb-0">No .Agenda</label>
                <input type="number"
                    class="form-control @error('no_agenda')
                is-invalid
            @enderror"
                    id="agenda" name="no_agenda" placeholder="Enter agenda"
                    value="{{ old('no_agenda', $surat->no_agenda) }}">
                @error('no_agenda')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group mb-3">
                <label for="tujuan" class="mb-0">Tujuan Surat</label>
                <input type="text"
                    class="form-control @error('tujuan_surat')
                is-invalid
            @enderror"
                    id="tujuan" name="tujuan_surat" placeholder="Enter tujuan"
                    value="{{ old('tujuan_surat', $surat->tujuan_surat) }}">
                @error('tujuan_surat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group mb-3">
                <label for="no-surat" class="mb-0">No. Surat</label>
                <input type="text"
                    class="form-control @error('no_surat')
                is-invalid
            @enderror"
                    id="no-surat" name="no_surat" placeholder="Enter No. surat"
                    value="{{ old('no_surat', $surat->no_surat) }}">
                @error('no_surat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group mb-3">
                <label for="akses" class="mb-0">Klasifikasi</label>
                <select class="form-control @error('klasifikasi_id')
                is-invalid
            @enderror"
                    name="klasifikasi_id" id="akses">
                    <option value="{{ $surat->klasifikasis->nama }}" selected hidden>{{ $surat->klasifikasis->nama }}
                    </option>

                    @foreach ($klasifikasis as $klasifikasi)
                        @if (old('klasifikasi_id', $surat->klasifikasis->nama) == $klasifikasi->id)
                            <option value="{{ $klasifikasi->id }}" selected>{{ $klasifikasi->nama }}</option>
                        @else
                            <option value="{{ $klasifikasi->id }}">{{ $klasifikasi->nama }}</option>
                        @endif
                    @endforeach
                </select>
                @error('klasifikasi_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group mb-2">
                <label for="date" class="mb-0">Tanggal Surat</label>
                <input type="date"
                    class="form-control @error('tanggal_surat')
                is-invalid
            @enderror"
                    name="tanggal_surat" id="date" placeholder="date"
                    value="{{ old('tanggal_surat', $surat->tanggal_surat) }}">
                @error('tanggal_surat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group mb-2">
                <label for="perihal" class="mb-0">Perihal</label>
                <input type="text"
                    class="form-control @error('perihal_surat')
                is-invalid
            @enderror"
                    name="perihal_surat" id="perihal" placeholder="perihal"
                    value="{{ old('perihal_surat', $surat->perihal_surat) }}">
                @error('perihal_surat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mt-2">

        <div class="col-lg-12 mb-2">
            <label for="pdf" class="mb-2">File Pdf</label>
            <div class="mb-0 d-flex">
                <input type="text" class="form-control rounded-0" disabled id="pdf" placeholder="pdf"
                    value="{{ $surat->file_surat }}">
                <a href="javascript:void(0);"
                    onclick="window.open('{{ route('surat-keluar.lihat', $surat->id) }}', 'myWindow', 'width=600,height=800');"
                    class="btn btn-info d-inline-block rounded-0">
                    <i class="fa fa-eye"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row mt-2 unggah-box">
        <div class="col-lg-12">
            <label for="" class="text-left mb-0">Unggah File</label>
            <div class="mb-0">
                <small class="text-danger">
                    <font class="text-danger">*</font>File yang diunggah berformat pdf dengan ukuran maksimal 2mb
                </small>
            </div>
            <div class="konten pb-3">
                <div class="box rounded">
                    <input type="file" name="file_surat" id="dokumen" class="inputfile inputfile-4"
                        data-multiple-caption="{count} files selected" accept=".pdf" />
                    <label for="dokumen">
                        <figure>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                viewBox="0 0 20 17">
                                <path
                                    d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                            </svg>
                        </figure>
                        <span>Pilih File&hellip;</span>
                    </label>
                </div>
            </div>

        </div>
    </div>
    <div class="mb-3 text-right">
        <button type="submit" class="btn btn-primary col-2 rounded-pill">Simpan</button>
    </div>
</form>
