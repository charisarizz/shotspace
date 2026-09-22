@extends('layouts.app')

@section('title', 'Halaman Pendaftaran')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pendaftar</h1>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0">Daftar Shotties Mendaftar</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Event</th>
                        <th>Nama Peserta</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Alamat</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftarans as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><span class="badge badge-info">{{ $item->event->nama_event ?? '-' }}</span></td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <a href="#"
                                    onclick="handleDestroy('{{ route('admin.pendaftaran.destroy', encrypt($item->id)) }}')"
                                    class="btn btn-link text-danger p-0 mx-2" title="Hapus">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
    <script type="text/javascript" src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        $('.datatable').dataTable();

        function handleDestroy(url) {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data pendaftar ini akan dihapus permanen!",
                icon: "warning",
                showCancelButton: true,
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
                draggable: true
            });
        </script>
    @endif
@endpush