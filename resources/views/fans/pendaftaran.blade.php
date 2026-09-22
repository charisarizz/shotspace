@extends('layouts.app')

@section('title', 'Form Pendaftaran')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-lg p-4">
                <div class="card-body">
                    <h4 class="font-weight-bold text-dark mb-4">Form Pendaftaran</h4>

                    <form action="{{ route('fans.pendaftaran.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ encrypt($event->id) }}">

                        <div class="form-group mb-3">
                            <label class="font-weight-bold small text-muted">Event yang Dipilih</label>
                            <input type="text" class="form-control bg-light border-0" value="{{ $event->nama_event }} - {{ date('d M Y', strtotime($event->tanggal)) }} (terkunci)" readonly>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold small text-muted">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control bg-light border-0" placeholder="Nama kamu" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold small text-muted">Email</label>
                            <input type="email" name="email" class="form-control bg-light border-0" placeholder="email@mail.com" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold small text-muted">No. HP</label>
                            <input type="text" name="no_hp" class="form-control bg-light border-0" placeholder="08xxxxxxxxxx" required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-bold small text-muted">Alamat</label>
                            <textarea name="alamat" class="form-control bg-light border-0" rows="3" placeholder="Alamat domisili" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-lg font-weight-bold py-3">
                            Daftar Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection