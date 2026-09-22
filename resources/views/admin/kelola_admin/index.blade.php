@extends('layouts.app')

@section('title', 'Kelola Admin - ShotSpace')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Data Admin</h1>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
            <h5 class="card-title font-weight-bold text-primary mb-0">Daftar Admin</h5>
            <button type="button" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#modalTambahAdmin">
                <i class="fas fa-plus-circle mr-2"></i>Tambah Admin Baru
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-items-center datatable">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td class="align-middle">{{ $key + 1 }}</td>
                                <td class="align-middle">{{ $user->nama }}</td>
                                <td class="align-middle">{{ $user->email }}</td>
                                <td class="align-middle text-center">
                                    <button type="button" 
                                            onclick="handleDestroy('{{ route('admin.kelola_admin.destroy', encrypt($user->id)) }}')"
                                            class="btn btn-sm btn-danger px-3" title="Hapus">
                                        <i class="fas fa-trash mr-1"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahAdmin" tabindex="-1" role="dialog" aria-labelledby="modalTambahAdminLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-primary" id="modalTambahAdminLabel">Tambah Admin Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.kelola_admin.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="font-weight-bold small text-muted">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama admin" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold small text-muted">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="contoh@mail.com" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold small text-muted">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Simpan Admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <form id="form-destroy" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" />
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datatable').DataTable();
        });

        function handleDestroy(url) {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data admin ini akan dihapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#e74a3b",
                cancelButtonColor: "#858796",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-destroy').attr('action', url);
                    $('#form-destroy').submit();
                }
            });
        }
    </script>

    @if (session('success'))
        <script type="text/javascript">
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success",
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script type="text/javascript">
            Swal.fire({
                title: "Gagal!",
                text: "{{ session('error') }}",
                icon: "error"
            });
        </script>
    @endif
@endpush