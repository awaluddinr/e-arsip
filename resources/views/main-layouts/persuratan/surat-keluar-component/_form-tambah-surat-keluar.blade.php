<form>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group mb-3">
                <label for="agenda" class="mb-0">No .Agenda</label>
                <input type="number" class="form-control" id="agenda" placeholder="Enter agenda">
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group mb-3">
                <label for="asal" class="mb-0">Tujuan Surat</label>
                <input type="text" class="form-control" id="asal" placeholder="Enter tujuan">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group mb-3">
                <label for="no-surat" class="mb-0">No. Surat</label>
                <input type="text" class="form-control" id="no-surat" aria-describedby="emailHelp"
                    placeholder="Enter No. surat">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group mb-3">
                <label for="akses" class="mb-0">Klasifikasi</label>
                <select class="form-control" id="akses">
                    <option value="" selected disabled hidden>Choose here</option>
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
                <input type="date" class="form-control" id="date" placeholder="date">
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group mb-3">
                <label for="keterangan" class="mb-0">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" placeholder="keterangan">
            </div>
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
                    <label class="custom-file-label" for="inputGroupFile03">Unggah Surat Keluar</label>
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
