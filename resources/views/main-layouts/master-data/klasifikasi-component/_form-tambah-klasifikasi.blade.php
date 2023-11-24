<form action="{{ route('klasifikasi.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="klasifikasi" class="mb-0">
                    Nama Klasifikasi
                </label>
                <input type="text" class="form-control" id="klasifikasi" placeholder="Enter klasifikasi" name="nama">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
