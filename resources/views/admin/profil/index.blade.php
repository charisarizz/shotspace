@extends('layouts.app')

@section('title', 'Profil Admin - ShotSpace')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Profil Saya</h1>
    </div>

    <div class="card border-0 shadow-sm col-md-8 p-0 mb-4">
        <div class="card-body p-4">
            <h5 class="font-weight-bold text-primary mb-3">Informasi Akun</h5>

            <form action="{{ route('admin.profil.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label class="font-weight-bold small text-muted">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama', $user->nama) }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label class="font-weight-bold small text-muted">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr class="my-4">
                <h5 class="font-weight-bold text-primary mb-3">Ubah Password</h5>

                <div class="form-group mb-3">
                    <label class="font-weight-bold small text-muted">Password Baru <small class="text-muted">(Kosongkan jika
                            tidak ingin diubah)</small></label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Masukkan password baru">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary font-weight-bold mt-2">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
@endsection
