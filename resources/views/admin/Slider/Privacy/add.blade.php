@extends('layouts.admin.app')
@section('title','Slider Management')
@push('before-css')
<link href="{{asset('plugins/vendors/morrisjs/morris.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/c3-master/c3.min.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
<link href="{{asset('plugins/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/pages/google-vector-map.css')}}" rel="stylesheet">
<link href="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css') }}" rel="stylesheet">
<style type="text/css">
    p.error-message {
        color: #df0a0a;
        font-weight: 500;
        font-size: 14px;
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
                        <h5 class="card-title m-b-0 align-self-center">Add Slider</h5>
                        <div class="ml-auto text-light-blue">
                            <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12"
                                role="tablist">
                            </ul>
                        </div>
                    </div>
                    <form action="{{url('/panel/admin/privacy-slider')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                      
                         <!--  <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                            @error('title')
                            <p class="error-message">**{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sub_title" >Sub Title:</label>
                            <input type="text" class="form-control" id="sub_title" name="sub_title">
                            @error('sub_title')
                            <p class="error-message">**{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bottom_text">Bottom Text:</label>
                            <textarea class="form-control" id="bottom_text" name="bottom_text" rows="3"></textarea>
                            @error('bottom_text')
                            <p class="error-message">**{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="sub_text">Button Name:</label>
                            <input type="text" class="form-control" id="button_name" name="button_name">
                            @error('button_name')
                            <p class="error-message">**{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sub_text">Button Link:</label>
                            <input type="text" class="form-control" id="button_link" name="button_link">
                            @error('button_link')
                            <p class="error-message">**{{ $message }}</p>
                            @enderror
                        </div> -->

                        <div class="form-group">
                            <input type="file" name="image_path" id="input-file-now" class="dropify" />
                            @error('image_path')
                            <p class="error-message">**{{ $message }}</p>
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
<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#description').summernote({
            placeholder: 'Type Slider Details',
            tabsize: 2,
            height: 100
        });
    });
</script>
@endpush
