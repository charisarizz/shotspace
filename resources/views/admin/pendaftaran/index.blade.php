@extends('layouts.app')

@section('title', 'Halaman Pendaftaran')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Data Pendaftar</h1>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
            <h5 class="card-title font-weight-bold text-primary mb-0">Daftar Shotties Mendaftar</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-items-center datatable">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">No</th>
                            <th>Event</th>
                            <th>Nama Peserta</th>
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Alamat</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftarans as $key => $item)
                            <tr>
                                <td class="align-middle">{{ $key + 1 }}</td>
                                <td class="align-middle"><span
                                        class="badge badge-info">{{ $item->event->nama_event ?? '-' }}</span></td>
                                <td class="align-middle">{{ $item->nama }}</td>
                                <td class="align-middle">{{ $item->email }}</td>
                                <td class="align-middle">{{ $item->no_hp }}</td>
                                <td class="align-middle">{{ $item->alamat }}</td>
                                <td class="align-middle text-center">
                                    <button type="button"
                                        onclick="handleDestroy('{{ route('admin.pendaftaran.destroy', encrypt($item->id)) }}')"
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
                text: "Data pendaftar ini akan dihapus permanen!",
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

    @if (Session::has('success'))
        <script type="text/javascript">
            Swal.fire({
                title: "Berhasil!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif
@endpush
