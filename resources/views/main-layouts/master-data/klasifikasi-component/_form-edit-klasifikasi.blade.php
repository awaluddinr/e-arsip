<form>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group mb-3">
                <label for="kode" class="mb-0">
                    <font class="text-danger">*</font>Kode
                </label>
                <input type="text" class="form-control" id="kode" placeholder="Enter kode"
                    value="{{ $data['kode'] }}">
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group mb-3">
                <label for="klasifikasi" class="mb-0">
                    <font class="text-danger">*</font>Nama Klasifikasi
                </label>
                <input type="text" class="form-control" id="klasifikasi" placeholder="Enter klasifikasi"
                    value="{{ $data['nama-klasifikasi'] }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <div class="form-group">
                    <label for="uraian">
                        <font class="text-danger">*</font>Uraian
                    </label>
                    <textarea class="form-control text-left" placeholder="Tambahkan '-' jika anda tidak ingin mengisi uraian "
                        id="uraian" rows="3" cols="80">{{ $data['uraian'] }}</textarea>
                </div>
            </div>
        </div>
    </div>
</form>
