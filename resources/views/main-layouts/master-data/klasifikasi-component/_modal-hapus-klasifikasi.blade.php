<div class="modal fade" id="modalHapus{{ $klasifikasi->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title">Hapus Klasifikasi</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('klasifikasi.destroy', $klasifikasi->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <h6>Apakah Anda Yakin Ingin Menghapus Data ??</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
