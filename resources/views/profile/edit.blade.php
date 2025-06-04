@extends('layouts.admin.app')
@section('title', 'Edit Profile')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Profile</h4>
                    <hr>

                    @if (session('status') === 'profile-updated')
                        <div class="alert alert-success mb-4">
                            Profile updated successfully.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" id="profileForm">
                        @csrf
                        @method('PATCH')

                        <!-- Step Indicators -->
                        <div class="mb-4">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#">User Profile</a></li>
                                <li class="nav-item"><a class="nav-link disabled" href="#">Bio</a></li>
                                <li class="nav-item"><a class="nav-link disabled" href="#">Address</a></li>
                            </ul>
                        </div>

                        <!-- Step 1 -->
                        <div class="step step-1">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required>
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input id="password" name="password" type="password" class="form-control">
                                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="dob">Date of Birth</label>
                                    <input id="dob" name="dob" type="date" class="form-control" value="{{ old('dob', $user->dob ?? '') }}">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary" onclick="nextStep(2)">Next</button>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="step step-2 d-none">
                            <div class="form-group">
                                <label for="image">Profile Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea name="bio" id="bio" class="form-control" rows="4">{{ old('bio', $user->bio ?? '') }}</textarea>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" onclick="nextStep(1)">Back</button>
                                <button type="button" class="btn btn-primary" onclick="nextStep(3)">Next</button>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="step step-3 d-none">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('gender', $user->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender', $user->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender', $user->gender ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="country">Country</label>
                                    <input id="country" name="country" type="text" class="form-control" value="{{ old('country', $user->country ?? '') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="state">State</label>
                                    <input id="state" name="state" type="text" class="form-control" value="{{ old('state', $user->state ?? '') }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <input id="city" name="city" type="text" class="form-control" value="{{ old('city', $user->city ?? '') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <input id="address" name="address" type="text" class="form-control" value="{{ old('address', $user->address ?? '') }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="phone">Phone</label>
                                    <input id="phone" name="phone" type="text" class="form-control" value="{{ old('phone', $user->phone ?? '') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="zip">Postal / Zip Code</label>
                                <input id="zip" name="zip" type="text" class="form-control" value="{{ old('zip', $user->zip ?? '') }}">
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" onclick="nextStep(2)">Back</button>
                                <button type="submit" class="btn btn-success text-white">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.admin.templates.footer')

@endsection
@push('js')
<script>
    function nextStep(step) {
        document.querySelectorAll('.step').forEach((el) => el.classList.add('d-none'));
        document.querySelector(`.step-${step}`).classList.remove('d-none');
    }
</script>
@endpush

