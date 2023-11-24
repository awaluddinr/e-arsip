<form method="POST" action="{{ route('password.update', $user['id']) }}">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="current_password" class="mb-0">Password Anda Saat Ini</label>
                <input type="password"
                    class="form-control @error('current_password')
                    is-invalid
                @enderror"
                    id="current_password" name="current_password" placeholder="Password">
                @error('current_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="password" class="mb-0">Password Baru</label>
                <input type="password"
                    class="form-control @error('password')
                    is-invalid
                @enderror"
                    id="password" name="password" placeholder="Password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="password2" class="mb-0">Konfirmasi Password</label>
                <input type="password"
                    class="form-control @error('password_confirmation')
                is-invalid
            @enderror"
                    id="password2" name="password_confirmation" placeholder="Password">
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="mb-3 text-right">
        <button type="submit" class="btn btn-primary rounded-pill">Simpan</button>
    </div>
</form>
