<form action="{{ route('role.update', $roles->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group mb-2">
                <label for="Role" class="mb-1">Nama role</label>
                <input type="text"
                    class="form-control @error('role')
                    is-invalid
                @enderror"
                    id="Role" name="role" placeholder="Enter Role" value="{{ old('role', $roles->name) }}">
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
                        <p class="my-3 font-weight-bold">
                            <u class="bg-success p-2 rounded">
                                Hak Akses Yang Dimiliki User
                            </u>
                        </p>
                    </div>
                </div>
                <div class="row">
                    @foreach ($permissions as $permission)
                        <div class="col-lg-3">
                            <!-- checkbox -->
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="checkboxPrimary{{ $permission->id }}"
                                        name="permissions[]" value="{{ $permission->name }}" checked>
                                    <label for="checkboxPrimary{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <p class="my-3 font-weight-bold">
                            <u class="bg-danger p-2 rounded">
                                Hak Akses Yang Tidak Dimiliki User
                            </u>
                        </p>
                    </div>
                </div>
                <div class="row">
                    @if ($permissionsNotOwned->isEmpty())
                        <div class="col-lg-12">
                            <h5 class="text-danger">Tidak ada hak akses. User telah memiliki semua hak akses</h5>
                        </div>
                    @else
                        @foreach ($permissionsNotOwned as $permission)
                            <div class="col-lg-3">
                                <!-- checkbox -->
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="checkboxPrimary{{ $permission->id }}"
                                            name="permissions[]" value="{{ $permission->name }}">
                                        <label for="checkboxPrimary{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3 mt-3 text-center border border-bottom-0 border-left-0 border-right-0 py-3 border-top">
        <button type="submit" class="btn btn-primary col-4 rounded-pill">Simpan</button>
    </div>
</form>
