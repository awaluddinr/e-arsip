<div class="modal fade" id="modalDetailRole{{ $role->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title ">Detail Role</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body py-1">
                {{-- <h6>{{ $role->name }}</h6> --}}
            </div>
            <div class="">

                <div class="d-inline" id="roleDetailContent{{ $role->id }}"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
