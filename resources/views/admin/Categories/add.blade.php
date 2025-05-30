@extends('layouts.admin.app')
@section('title', 'Create Category')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create Category</h4>
          <hr>
          <form class="forms-sample" action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="category_name">Category Name</label>
              <input type="text" name="name" class="form-control" id="category_name" placeholder="Enter name" required>
            </div>
            <div class="form-group">
              <label for="category_description">Description</label>
              <textarea class="form-control" id="category_description" rows="4" name="description" placeholder="Enter description" required></textarea>
            </div>
            <div class="d-flex justify-content-end gap-2">
              <a href="{{ route('categories.index') }}" class="btn btn-light border">Cancel</a>
              <button type="submit" class="btn btn-success text-white">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@include('layouts.admin.templates.footer')
@endsection
