@extends('layouts.app')

@section('title', 'Detail Event')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <a href="{{ route('fans.index') }}" class="text-primary text-decoration-none small d-inline-block mb-3">
                &lt; Kembali ke daftar event
            </a>

            <div class="card border-0 shadow-sm rounded-lg p-4">
                <div class="card-body">
                    <h3 class="font-weight-bold text-dark mb-2">{{ $event->nama_event }}</h3>
                    <p class="text-muted border-bottom pb-3 mb-4">
                        {{ date('d M Y', strtotime($event->tanggal)) }} - {{ $event->lokasi }}
                    </p>

                    <div class="mb-5 text-dark" style="line-height: 1.8;">
                        {{ $event->deskripsi }}
                    </div>

                    <a href="{{ route('fans.pendaftaran', encrypt($event->id)) }}" class="btn btn-primary btn-block btn-lg font-weight-bold py-3">
                        Daftar Event Ini
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection