@extends('layouts.auth')

@section('title', 'Login Admin - ShotSpace')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-5 col-md-8">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-1 fw-bold">SHOTSPACE ADMIN</h1>
                                        <p class="text-muted small mb-4">Masuk untuk mengelola aplikasi</p>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}" class="user">
                                        @csrf

                                        <div class="form-group mb-3">
                                            <input type="email" name="email" id="email"
                                                class="form-control form-control-user input-shotspace @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" placeholder="admin@mail.com" required>
                                            @error('email')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <input type="password" name="password" id="password"
                                                class="form-control form-control-user input-shotspace @error('password') is-invalid @enderror"
                                                placeholder="••••••••" required>
                                            @error('password')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-4">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" name="remember" id="remember"
                                                    class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="remember">Remember Me</label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-shotspace btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
