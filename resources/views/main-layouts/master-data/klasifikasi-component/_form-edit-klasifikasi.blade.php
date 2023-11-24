<form action="{{ route('klasifikasi.update', $klasifikasi->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="klasifikasi" class="mb-0">
                    <font class="text-danger">*</font>Nama Klasifikasi
                </label>
                <input type="text" class="form-control" name="nama" id="klasifikasi" placeholder="Enter klasifikasi"
                    value="{{ $klasifikasi->nama }}">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
