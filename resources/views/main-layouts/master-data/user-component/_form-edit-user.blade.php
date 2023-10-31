<form>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group mb-3">
                <label for="username" class="mb-0">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username"
                    value="{{ $hasil['username'] }}">
            </div>
        </div>
        <div class="col-lg-8">
            <div class="form-group mb-3">
                <label for="name" class="mb-0">Nama</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name"
                    value="{{ $hasil['nama'] }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group mb-3">
                <label for="email" class="mb-0">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                    placeholder="Enter email" value="{{ $hasil['email'] }}">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group mb-3">
                <label for="akses" class="mb-0">Hak Akses</label>
                <select class="form-control" id="akses">
                    <option value="{{ $hasil['hak-akses'] }}" selected hidden>{{ $hasil['hak-akses'] }}</option>
                    <option>Administrator</option>
                    <option>Petugas</option>
                </select>
            </div>
        </div>
    </div>
    <div class="mb-3 text-right">
        <button type="submit" class="btn btn-primary col-2 rounded-pill">Simpan</button>
    </div>
</form>
