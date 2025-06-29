<div class="container">
    <h2>Register</h2>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Error Message --}}
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Form ... --}}
    <form action="{{ route('superadmin.registrasi') }}" method="POST" onsubmit="return validatePassword();">
        @csrf

        <div class="form-group mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="">-- Pilih Role --</option>
                <option value="Super Admin">Super Admin</option>
                <option value="Admin Akademik">Admin Akademik</option>
                <option value="Admin Prodi">Admin Prodi</option>
                <option value="Admin Pegawai">Admin Pegawai</option>
                <option value="Dosen">Dosen</option>
                <option value="Mahasiswa">Mahasiswa</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div id="password-error" class="text-danger mb-3" style="display: none;">
            Password harus mengandung huruf besar, huruf kecil, angka, dan simbol.
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
</div>
