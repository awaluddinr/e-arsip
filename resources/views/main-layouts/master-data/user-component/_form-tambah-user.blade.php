<form method="POST" action="{{ route('data-user.store') }}">
    @csrf
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group mb-3">
                <label for="username" class="mb-0">Username</label>
                <input type="text"
                    class="form-control @error('username')
                    is-invalid
                @enderror"
                    id="username" name="username" placeholder="Enter username" value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group mb-3">
                <label for="name" class="mb-0">Nama</label>
                <input type="text"
                    class="form-control  @error('nama')
                is-invalid
            @enderror" id="name"
                    name="nama" placeholder="Enter name" value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group mb-3">
                <label for="email" class="mb-0">Email address</label>
                <input type="email"
                    class="form-control @error('email')
                is-invalid
            @enderror" id="email"
                    name="email" placeholder="Enter email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group mb-3">
                <label for="akses" class="mb-0">Hak Akses</label>
                <select
                    class="form-control @error('hak-akses')
                    is-invalid
                @enderror"
                    id="akses" name="hak-akses">
                    <option value="" selected disabled hidden>Pilih Role</option>
                    @if (empty($roles))
                        <option value="" disabled>Tidak ada role, Harap tambahkan role!!</option>
                    @else
                        @foreach ($roles as $role)
                            @if (old('hak-akses') == $role)
                                <option value="{{ $role }}" selected>{{ $role }}</option>
                            @else
                                <option value="{{ $role }}">{{ $role }}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
                @error('hak-akses')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group mb-3">
                <label for="password" class="mb-0">Password</label>
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
        <div class="col-lg-6">
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
        <button type="submit" class="btn btn-primary col-2 rounded-pill">Simpan</button>
    </div>
</form>
