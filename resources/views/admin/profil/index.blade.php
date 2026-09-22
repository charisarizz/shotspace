@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil Saya</h1>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Profil Admin</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profil.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label>Password Baru <small class="text-muted">(Kosongkan jika tidak ingin diubah)</small></label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password baru">
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <span class="fa fa-save mr-1"></span> Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @if (Session::has('success'))
        <script type="text/javascript">
            Swal.fire({
                title: "Berhasil!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                draggable: true
            });
        </script>
    @endif
@endpush