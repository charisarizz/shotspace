@extends('layouts.app')

@section('title', 'Tentang LNGSHOT')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="font-weight-bold text-primary mb-3">Tentang LNGSHOT</h2>
        <div class="card border-0 shadow-sm rounded-lg max-w-xl mx-auto p-3">
            <div class="card-body">
                <p class="text-muted mb-0">
                    LNGSHOT adalah grup K-pop beranggotakan 4 orang di bawah naungan agensi More Vision. Debut dengan lagu "Moonwalkin'", LNGSHOT dikenal lewat perpaduan hip-hop dan visual yang khas.
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        @php
            $members = [
                ['nama' => 'Ohyul', 'role' => 'Idol', 'foto' => 'o-hyul.jpg'],
                ['nama' => 'Ryul', 'role' => 'Idol', 'foto' => 'ryul.jpg'],
                ['nama' => 'Woojin', 'role' => 'Idol', 'foto' => 'woojin.jpg'],
                ['nama' => 'Louis', 'role' => 'Idol', 'foto' => 'louis.jpg'],
            ];
        @endphp

        @foreach ($members as $member)
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm rounded-lg text-center p-3">
                    <div class="bg-light rounded mb-3 d-flex align-items-center justify-content-center" style="height: 180px;">
                        <span class="text-muted">Foto</span>
                    </div>
                    <h5 class="font-weight-bold text-dark mb-1">{{ $member['nama'] }}</h5>
                    <p class="text-muted small mb-0">{{ $member['role'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection