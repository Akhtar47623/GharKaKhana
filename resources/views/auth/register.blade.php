@extends('layouts.app')

@section('title', 'Register')

@section('content')
<style>
    /* Full height container to vertically center content */
    .vh-100 {
        height: 100vh;
    }
</style>

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="col-12 col-sm-8 col-md-6 col-lg-5">
        <div class="card p-4 shadow-sm">
            <h3 class="mb-4 text-center">Create Your Account</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 small">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Register As</label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="" disabled {{ old('role') ? '' : 'selected' }}>-- Select Role --</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                {{ ucfirst($role->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn w-100" style="background:#4B49AC; color:white;">Register</button>

                <p class="text-center mt-3 mb-0">
                    Already have an account? <a href="{{ route('login') }}">Login here</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
