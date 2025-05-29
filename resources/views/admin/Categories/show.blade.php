@extends('layouts.admin.app')
@section('title', 'Category Details')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Category Details</h4>
          <hr>

          <div class="mb-4">
            <strong>Name:</strong>
            <p>{{ $category->name }}</p>
          </div>

          <div class="mb-4">
            <strong>Description:</strong>
            <p>{{ $category->description }}</p>
          </div>

          <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('categories.index') }}" class="btn btn-light border">Back</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@include('layouts.admin.templates.footer')
@endsection
