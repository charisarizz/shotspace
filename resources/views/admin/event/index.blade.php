@extends('layouts.app')

@section('title', 'Halaman Event')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Event</h1>
    </div>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0">Daftar Event</h5>
            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#formTambahEvent">
                <span class="fa fa-plus-circle mr-2"></span>
                <span>Tambah Event Baru</span>
            </button>
        </div>
        
        <div class="collapse" id="formTambahEvent">
            <div class="card-body border-bottom bg-light">
                <form action="{{ route('admin.event.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Event</label>
                        <input type="text" name="nama_event" class="form-control" required placeholder="Masukkan nama event">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3" required placeholder="Masukkan deskripsi event"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" required placeholder="Masukkan lokasi">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Kuota Peserta</label>
                            <input type="number" name="kuota" class="form-control" required placeholder="Jumlah kuota">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <span class="fa fa-save mr-1"></span> Simpan Event
                    </button>
                </form>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Event</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Kuota</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->nama_event }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                            <td>{{ $item->lokasi }}</td>
                            <td>{{ $item->kuota }}</td>
                            <td>
                                <a href="#"
                                    onclick="handleDestroy('{{ route('admin.event.destroy', encrypt($item->id)) }}')"
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
    <script type="text/javascript" src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        $('.datatable').dataTable();

        function handleDestroy(url) {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
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