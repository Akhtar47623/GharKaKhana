@extends('layouts.admin.app')
@section('title', 'Edit Category')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Category</h4>
          <hr>

          <form class="forms-sample" action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="category_name">Category Name</label>
              <input type="text" name="name" class="form-control" id="category_name" placeholder="Enter category name" value="{{ old('name', $category->name) }}">
            </div>

            <div class="form-group">
              <label for="category_description">Description</label>
              <textarea class="form-control" id="category_description" rows="4" name="description" placeholder="Enter description">{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="d-flex justify-content-end gap-2">
              <a href="{{ route('categories.index') }}" class="btn btn-light border">Cancel</a>
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@include('layouts.admin.templates.footer')
@endsection
