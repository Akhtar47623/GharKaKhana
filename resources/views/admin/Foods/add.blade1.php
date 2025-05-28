@extends('layouts.admin.app')
@section('title','Product')
@push('before-css')
<link href="{{asset('plugins/vendors/morrisjs/morris.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/c3-master/c3.min.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
<link href="{{asset('plugins/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/pages/google-vector-map.css')}}" rel="stylesheet">
<link href="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css') }}" rel="stylesheet">
<style>
  p.error-message {
    color: #f00;
    font-weight: 500;
  }
</style>

@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex m-b-10 no-block">
            <h5 class="card-title m-b-0 align-self-center">Add Product</h5>
            <div class="ml-auto text-light-blue">
              <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12" role="tablist">
              </ul>
            </div>
          </div>
          <form action="{{url('/admin/product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" id="product_name" value="{{ old('product_name') }}" name="product_name" >
                @error('product_name')
                <p class="error-message">**{{ $message }}</p>
                @enderror
              </div>

              <div class="form-group col-md-6">
                <label for="product_num">Product Number:</label>
                <input type="text" class="form-control" id="product_num" value="{{ old('product_num') }}" name="product_num" >
                @error('product_num')
                <p class="error-message">**{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="category">Category:</label>
                <select class="form-control" id="category" value="{{ old('category') }}" name="category">
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}" selected>{{$category->name}}</option>
                  @endforeach
                </select>
                @error('category')
                <p class="error-message">**{{ $message }}</p>
                @enderror
              </div>

              <div class="form-group col-md-6">
                <label for="product_quantity">Product Quantity:</label>
                <input type="number" class="form-control" min="0" name="product_quantity">
                @error('product_quantity')
                <p class="error-message">**{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <label for="product_price">Product Price:</label>
              <input type="text" class="form-control" name="product_price">
              @error('product_price')
                  <p class="error-message">**{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="product_description">Description:</label>
              <textarea class="form-control" id="product_description" name="product_description" rows="3"></textarea>
              @error('product_description')
                  <p class="error-message">**{{ $message }}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="product_image">Add Image :</label>
              <div class="input-group control-group" >
                <input type="file" name="product_image" class="myfrm form-control">
              </div>
              @error('product_image')
              <p class="error-message">**{{ $message }}</p>
              @enderror
            </div>
            <button class="btn btn-success pull-center" type="submit">Add Product</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @include('layouts.admin.includes.templates.footer')
</div>

@endsection

@push('js')
<script src="{{asset('plugins/vendors/d3/d3.min.js')}}"></script>
<script src="{{asset('plugins/vendors/c3-master/c3.min.js')}}"></script>
<script src="{{asset('plugins/vendors/knob/jquery.knob.js')}}"></script>
<script src="{{asset('plugins/vendors/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('plugins/vendors/raphael/raphael-min.js')}}"></script>
<script src="{{asset('plugins/vendors/morrisjs/morris.js')}}"></script>
<script src="{{asset('plugins/vendors/toast-master/js/jquery.toast.js')}}"></script>
<script src="{{asset('plugins/vendors/datatables/jquery.dataTables.min.js')}}"></script>

<script>
  $(document).ready(function(){
    $('#product_description').summernote({
      placeholder: 'Type Category Details',
      tabsize: 2,
      height: 100
    });
  });
</script>
<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>

@endpush

