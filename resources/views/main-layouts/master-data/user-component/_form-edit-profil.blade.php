<form action="{{ route('profil.update', $user['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="username" class="mb-0">Username</label>
                <input type="text"
                    class="form-control @error('username')
                is-invalid
            @enderror"
                    name="username" id="username" placeholder="Enter username"
                    value="{{ old('username', $user['username']) }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="name" class="mb-0">Nama</label>
                <input type="text"
                    class="form-control @error('name')
                is-invalid
            @enderror" id="name"
                    name="name" placeholder="Enter name" value="{{ old('name', $user['name']) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="email" class="mb-0">Email address</label>
                <input type="email"
                    class="form-control @error('email')
                is-invalid
            @enderror" id="email"
                    aria-describedby="emailHelp" placeholder="Enter email" name="email"
                    value="{{ old('email', $user['email']) }}">
                @error('email')
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
