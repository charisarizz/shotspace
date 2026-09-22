@extends('layouts.app')

@section('title', 'Daftar Event LNGSHOT')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="font-weight-bold text-primary mb-2">Event LNGSHOT</h2>
        <p class="text-muted">Daftar sekarang dan jangan sampai ketinggalan momen bareng LNGSHOT.</p>
    </div>

    <div class="row">
        @forelse ($events as $event)
            <div class="col-md-6 mb-4">
                <a href="{{ route('fans.detail', encrypt($event->id)) }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm rounded-lg hover-shadow transition-all">
                        <div class="card-body p-4 d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="font-weight-bold text-dark mb-2">{{ $event->nama_event }}</h5>
                                <p class="text-muted small mb-0">
                                    {{ date('d M Y', strtotime($event->tanggal)) }} - {{ $event->lokasi }}
                                </p>
                            </div>
                            <div class="text-primary font-weight-bold h4 mb-0">&gt;</div>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-md-12 text-center py-5">
                <p class="text-muted">Belum ada event LNGSHOT saat ini.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection