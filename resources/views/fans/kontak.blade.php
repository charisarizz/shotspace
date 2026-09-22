@extends('layouts.app')

@section('title', 'Kontak Panitia ShotSpace')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="font-weight-bold text-primary mb-2">Kontak Panitia ShotSpace</h2>
        <p class="text-muted">Ada pertanyaan soal event atau pendaftaran? Hubungi kami.</p>
    </div>

    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm rounded-lg p-3 h-100">
                <div class="card-body">
                    <span class="text-primary small font-weight-bold">Email</span>
                    <h6 class="font-weight-bold text-dark mt-2 mb-0">hello@shotspace.id</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm rounded-lg p-3 h-100">
                <div class="card-body">
                    <span class="text-primary small font-weight-bold">Instagram</span>
                    <h6 class="font-weight-bold text-dark mt-2 mb-0">@shotspace.id</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm rounded-lg p-3 h-100">
                <div class="card-body">
                    <span class="text-primary small font-weight-bold">WhatsApp Panitia</span>
                    <h6 class="font-weight-bold text-dark mt-2 mb-0">0812-xxxx-xxxx</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-lg p-4">
        <div class="card-body">
            <h5 class="font-weight-bold text-dark mb-4">Kirim Pesan</h5>
            <form action="#" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label class="font-weight-bold small text-muted">Nama</label>
                    <input type="text" class="form-control bg-light border-0" placeholder="Nama kamu" required>
                </div>
                <div class="form-group mb-3">
                    <label class="font-weight-bold small text-muted">Pesan</label>
                    <textarea class="form-control bg-light border-0" rows="3" placeholder="Tulis pertanyaan kamu..." required></textarea>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection