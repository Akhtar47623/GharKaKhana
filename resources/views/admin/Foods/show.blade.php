@extends('layouts.admin.app')
@section('title', 'Food Details')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Food Details</h4>
          <hr>

          <div class="mb-4">
            <strong>Name:</strong>
            <p>{{ $food->name }}</p>
          </div>

          <div class="mb-4">
            <strong>Short Description:</strong>
            <p>{{ $food->short_desc }}</p>
          </div>

          @if($food->image)
            <div class="mb-4">
              <strong>Image:</strong><br>
              <img src="{{ asset($food->image) }}" width="200" height="200" style="border:1px solid #ccc; border-radius:8px;">
            </div>
          @endif

          <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('foods.edit', $food->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('foods.index') }}" class="btn btn-light border">Back</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@include('layouts.admin.templates.footer')
@endsection
