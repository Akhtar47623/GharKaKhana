@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-md-5 col-lg-4">
        <div class="card p-4 shadow-sm">
            <h3 class="mb-4 text-center">Login</h3>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>

                <button type="submit" class="btn w-100" style="background:#4B49AC; color:white;">Login</button>

                <p class="text-center mt-3 mb-0">
                    Don't have an account? <a href="{{ route('register') }}">Register here</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
