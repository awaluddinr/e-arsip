<div class="modal fade" id="modalHapus{{ $mail->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title">Hapus Surat Keluar</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('surat-keluar.destroy', $mail->id) }}" method="POST" class="d-inline-block">
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
