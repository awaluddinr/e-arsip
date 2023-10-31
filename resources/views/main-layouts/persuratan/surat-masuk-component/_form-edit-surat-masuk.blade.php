<form>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group mb-3">
                <label for="agenda" class="mb-0">No .Agenda</label>
                <input type="number" class="form-control" id="agenda" placeholder="Enter agenda" value="001">
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group mb-3">
                <label for="asal" class="mb-0">Asal Surat</label>
                <input type="text" class="form-control" id="asal" placeholder="Enter asal" value="kendari">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group mb-3">
                <label for="no-surat" class="mb-0">No. Surat</label>
                <input type="text" class="form-control" id="no-surat" aria-describedby="emailHelp"
                    placeholder="Enter No. surat" value="002/CCC/011">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group mb-3">
                <label for="akses" class="mb-0">Klasifikasi</label>
                <select class="form-control" id="akses">
                    <option value="" selected hidden>Undangan</option>
                    <option>Undangan</option>
                    <option>Pendidikan</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group mb-3">
                <label for="date" class="mb-0">Tanggal</label>
                <input type="date" class="form-control" id="date" placeholder="date" value="2023-09-26">
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group mb-3">
                <label for="keterangan" class="mb-0">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" placeholder="keterangan"
                    value="Undangan makan">
            </div>
        </div>
    </div>
    <div class="row mt-2">

        <div class="col-lg-10">
            <label for="pdf" class="mb-0">File Pdf</label>
            <input type="text" class="form-control" disabled id="pdf" placeholder="pdf"
                value="{{ $pdfUrl }}">
            <div class="mb-0">
                <small>
                    <font class="text-danger">* Non aktifkan fitur download manager anda untuk melihat file pdf
                    </font>
                </small>
            </div>
        </div>
        <div class="col-lg-2 my-auto">
            <a href="{{ route('pdf.view', ['filename' => $pdfUrl]) }}" class="btn btn-info mb-0" target="_blank">View
                PDF</a>
            {{-- <iframe src="{{ route('pdf.view', ['filename' => $pdfUrl]) }}" width="100%" height="600px"></iframe> --}}
        </div>

    </div>
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="input-group mb-0">
                <div class="input-group-prepend">
                    <button class="btn btn-success" type="button">File</button>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile03">
                    <label class="custom-file-label" for="inputGroupFile03">Unggah Surat Masuk</label>
                </div>
            </div>
            <div class="mb-0">
                <small>
                    <font class="text-danger">* ekstensi yang diizinkan yaitu pdf format dengan maksimal kapasitas 2 MB
                    </font>
                </small>
            </div>
        </div>
    </div>
    <div class="mb-3 text-right">
        <button type="submit" class="btn btn-primary col-2 rounded-pill">Simpan</button>
    </div>
</form>
