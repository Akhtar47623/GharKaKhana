@extends('layouts.admin.app')
@section('title', 'Discount')
@push('before-css')
<link href="{{asset('plugins/vendors/morrisjs/morris.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/c3-master/c3.min.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
<link href="{{asset('plugins/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/pages/google-vector-map.css')}}" rel="stylesheet">
<link href="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex m-b-10 no-block">
                        <h5 class="card-title m-b-0 align-self-center">Add Discount Details</h5>
                        <div class="ml-auto text-light-blue">
                            <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12"
                                role="tablist">
                            </ul>
                        </div>
                    </div>
                    <form action="{{url('/admin/discount/')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="discount_code">Add Discount Code:</label>
                            <input type="text" class="form-control" id="discount_code" name="discount_code">
                            @error('discount_code')
                            <p style="color: red;">**{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="max_usage">Max Usage By Users:</label>
                            <input type="number" class="form-control" id="max_usage" name="max_usage">
                            @error('max_usage')
                            <p style="color: red;">**{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start Date:</label>
                            <input type="text" class="form-control" id="start_date" onfocus="(this.type = 'date')" name="start_date">
                            @error('start_date')
                            <p style="color: red;">**{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date:</label>
                            <input type="text" class="form-control" onfocus="(this.type = 'date')" id="end_date" name="end_date">
                            @error('end_date')
                            <p style="color: red;">**{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount:</label>
                            <input type="number" class="form-control" id="discount" name="discount">
                            @error('discount')
                            <p style="color: red;">**{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="discount_type">Discount Type:</label>
                            <select class="form-control" id="discount_type" value="{{ old('discount_type') }}" name="discount_type">
                                <option value="percents">Percent</option>
                                <option value="fixed_amount">Fixed Amount</option>
                            </select>
                            @error('discount_type')
                            <p style="color: red;">**{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="discount_over">Discount Over:</label>
                            <select class="form-control" id="discount_over" value="{{ old('category') }}" name="discount_over">
                                <option value="products">Products</option>
                                <option value="shipment">Shipment</option>
                                <option value="both">Both</option>
                            </select>
                            @error('discount_over')
                            <p style="color: red;">**{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="max_discount">Maximum Discount:</label>
                            <input type="text" class="form-control" id="max_discount" name="max_discount">
                            @error('max_discount')
                            <p style="color: red;">**{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="min_required_amount">Minimum Required Amount:</label>
                            <input type="text" class="form-control" id="min_required_amount" value="{{ old('min_required_amount') }}" name="min_required_amount">
                            @error('min_required_amount')
                            <p style="color: red;">**{{ $message }}</p>
                            @enderror
                        </div>
                        <button class="btn btn-success pull-center" type="submit">Add</button>
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
  $('#answer').summernote({
    placeholder: 'Type FAQ Answer Here',
    tabsize: 2,
    height: 100
  });
  });

</script>
<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
@endpush
