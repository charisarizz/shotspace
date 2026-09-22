@extends('layouts.app')

@section('title', 'Dashboard - ShotSpace')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Total Event</div>
                    <div class="h2 mb-0 font-weight-bold text-gray-800">{{ $totalEvent }}</div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Total Shotties Terdaftar</div>
                    <div class="h2 mb-0 font-weight-bold text-gray-800">{{ $totalShotties }}</div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Pendaftar Hari Ini</div>
                    <div class="h2 mb-0 font-weight-bold text-gray-800">{{ $pendaftarHariIni }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">
            <h5 class="font-weight-bold text-gray-800 mb-4">Pendaftar Terbaru</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-items-center">
                    <thead class="thead-light">
                        <tr>
                            <th class="font-weight-bold">Nama</th>
                            <th class="font-weight-bold">Event</th>
                            <th class="font-weight-bold">Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendaftarTerbaru as $item)
                            <tr>
                                <td class="align-middle">{{ $item->nama }}</td>
                                <td class="align-middle">{{ $item->event->nama_event ?? '-' }}</td>
                                <td class="align-middle">{{ $item->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted">Belum ada pendaftar terbaru.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
