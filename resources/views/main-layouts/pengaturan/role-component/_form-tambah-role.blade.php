<form action="{{ route('role.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group mb-2">
                <label for="Role" class="mb-1">Nama role</label>
                <input type="text"
                    class="form-control @error('role')
                is-invalid
                @enderror "
                    id="Role" name="role" placeholder="Enter Role" value="{{ old('role') }}">
                @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-body px-2 py-2">
                <!-- Minimal style -->
                <div class="row">
                    <div class="col-lg-12">
                        <p class="mb-2 font-weight-bold"><u>Hak Akses User</u></p>
                    </div>
                </div>
                <div class="row">
                    @foreach ($permissions as $key => $permission)
                        <div class="col-lg-3">
                            <!-- checkbox -->
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="checkboxPrimary{{ $key }}" name="permissions[]"
                                        value="{{ $permission }}">
                                    <label for="checkboxPrimary{{ $key }}">
                                        {{ $permission }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3 mt-3 text-center border border-bottom-0 border-left-0 border-right-0 py-3 border-top">
        <button type="submit" class="btn btn-primary col-4 rounded-pill">Simpan</button>
    </div>
</form>
