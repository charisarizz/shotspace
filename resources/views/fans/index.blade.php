@extends('layouts.fans')

@section('title', 'Daftar Event LNGSHOT')

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="font-weight-bold text-dark mb-2">Event LNGSHOT</h2>
            <p class="text-muted">Daftar sekarang dan jangan sampai ketinggalan momen bareng LNGSHOT.</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show text-center mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            @forelse ($events as $event)
                <div class="col-md-6 mb-4">
                    <a href="{{ route('fans.detail', encrypt($event->id)) }}" class="text-decoration-none">
                        <div class="card border-0 shadow-sm p-3 card-event bg-white">
                            <div class="card-body d-flex justify-content-between align-items-center">
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
