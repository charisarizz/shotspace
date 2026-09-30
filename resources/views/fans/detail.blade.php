@extends('layouts.fans')

@section('title', 'Detail Event')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <a href="{{ route('fans.index') }}"
                    class="text-primary text-decoration-none small d-inline-block mb-3 font-weight-bold">
                    &lt; Kembali ke daftar event
                </a>

                <div class="card border-0 shadow-sm p-4 bg-white" style="border-radius: 16px;">
                    <div class="card-body">
                        <h3 class="font-weight-bold text-dark mb-2">{{ $event->nama_event }}</h3>
                        <p class="text-muted border-bottom pb-3 mb-4">
                            {{ date('d M Y', strtotime($event->tanggal)) }} - {{ $event->lokasi }}
                        </p>

                        <div class="mb-5 text-secondary" style="line-height: 1.8; min-height: 120px;">
                            {{ $event->deskripsi }}
                        </div>

                        <a href="{{ route('fans.pendaftaran', encrypt($event->id)) }}"
                            class="btn btn-primary btn-block font-weight-bold py-3 text-white"
                            style="background-color: #2b56f5; border: none; border-radius: 8px;">
                            Daftar Event Ini
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
