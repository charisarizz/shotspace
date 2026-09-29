@extends('layouts.app')

@section('title', 'Halaman Event')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Data Event</h1>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
            <h5 class="card-title font-weight-bold text-primary mb-0">Daftar Event</h5>
            <button type="button" class="btn btn-primary font-weight-bold" data-toggle="collapse" data-target="#formTambahEvent">
                <i class="fas fa-plus-circle mr-2"></i>Tambah Event Baru
            </button>
        </div>
        
        <div class="collapse" id="formTambahEvent">
            <div class="card-body border-bottom bg-light">
                <form action="{{ route('admin.event.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold small text-muted">Nama Event</label>
                        <input type="text" name="nama_event" class="form-control" required placeholder="Masukkan nama event">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold small text-muted">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3" required placeholder="Masukkan deskripsi event"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="font-weight-bold small text-muted">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-bold small text-muted">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" required placeholder="Masukkan lokasi">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-bold small text-muted">Kuota Peserta</label>
                            <input type="number" name="kuota" class="form-control" required placeholder="Jumlah kuota">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary font-weight-bold">
                        <i class="fas fa-save mr-1"></i> Simpan Event
                    </button>
                </form>
            </div>
        </div>

        <div class="card-body" id="tabelEvent">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-items-center datatable">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Event</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Kuota</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $key => $item)
                            <tr>
                                <td class="align-middle">{{ $key + 1 }}</td>
                                <td class="align-middle">{{ $item->nama_event }}</td>
                                <td class="align-middle">{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                                <td class="align-middle">{{ $item->lokasi }}</td>
                                <td class="align-middle">{{ $item->kuota }}</td>
                                <td class="align-middle text-center">
                                    <button type="button" 
                                            onclick="handleDestroy('{{ route('admin.event.destroy', encrypt($item->id)) }}')"
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

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#formTambahEvent').on('show.bs.collapse', function () {
                $('#tabelEvent').slideUp();
            });

            $('#formTambahEvent').on('hide.bs.collapse', function () {
                $('#tabelEvent').slideDown();
            });
        });
    </script>
@endpush