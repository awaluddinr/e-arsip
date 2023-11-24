<!-- modal -->
<div class="modal fade" id="modalEdit{{ $klasifikasi->id }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title">Edit Klasifikasi</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('main-layouts.master-data.klasifikasi-component._form-edit-klasifikasi')
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
