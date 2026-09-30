@extends('layouts.fans')

@section('title', 'Form Pendaftaran Event')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('fans.detail', encrypt($event->id)) }}"
                    class="text-primary text-decoration-none small d-inline-block mb-3 font-weight-bold">
                    &lt; Batal dan Kembali
                </a>

                <div class="card border-0 shadow-sm p-4 bg-white" style="border-radius: 16px;">
                    <div class="card-body">
                        <h3 class="font-weight-bold text-dark mb-4">Form Pendaftaran Event</h3>

                        <form action="{{ route('fans.pendaftaran.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ encrypt($event->id) }}">

                            <div class="form-group mb-3">
                                <label class="font-weight-bold text-muted small">Event yang Dipilih</label>
                                <input type="text" class="form-control bg-light" value="{{ $event->nama_event }}"
                                    readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold small">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control"
                                    placeholder="Masukkan nama lengkap" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold small">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="contoh@email.com"
                                    required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold small">Nomor HP / WhatsApp</label>
                                <input type="text" name="no_hp" class="form-control" placeholder="08xxxxxxxxxx"
                                    required>
                            </div>

                            <div class="form-group mb-4">
                                <label class="font-weight-bold small">Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block font-weight-bold py-3 text-white"
                                style="background-color: #2b56f5; border: none; border-radius: 8px;">
                                Kirim Pendaftaran
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
