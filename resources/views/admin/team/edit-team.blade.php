@extends('layouts.admin.app')
@section('title', 'Team')
@push('before-css')
<link href="{{asset('plugins/vendors/morrisjs/morris.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/c3-master/c3.min.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
<link href="{{asset('plugins/vendors/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
<link href="{{asset('plugins/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet"
          type="text/css"/>
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
                        <h5 class="card-title m-b-0 align-self-center">Update Info</h5>
                        <div class="ml-auto text-light-blue">
                            <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12"
                                role="tablist">
                                <!--
                                <li>
                                    <a href="{{url('ecommerce-add-new')}}"
                                       class="btn waves-effect waves-light btn-rounded btn-primary">Add Product</a>
                                </li>
                                -->
                            </ul>
                        </div>
                    </div>
                    <form action="{{url('/admin/team/'.$team_detail->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $team_detail->name }}">
    </div>
    <div class="form-group">
        <label for="occupation">Occupation:</label>
        <input type="text" class="form-control" id="occupation" name="occupation" value="{{ $team_detail->occupation }}">
    </div>
    @if($team_detail->facebook_link != null)
    <div class="form-group">
        <label for="fb_link">Facebook Link:</label>
        <input type="text" class="form-control" id="fb_link" name="fb_link" value="{{ $team_detail->facebook_link }}">
    </div>
    @endif
    @if($team_detail->twitter_link != null)
    <div class="form-group">
        <label for="tw_link">Twitter Link:</label>
        <input type="text" class="form-control" id="tw_link" name="tw_link" value="{{ $team_detail->twitter_link }}">
    </div>
    @endif
    @if($team_detail->linkedin_link != null)
    <div class="form-group">
        <label for="LI_link">LinkedIn Link:</label>
        <input type="text" class="form-control" id="LI_link" name="LI_link" value="{{ $team_detail->linkedin_link }}">
    </div>
    @endif
    @if($team_detail->instagram_link != null)
    <div class="form-group">
        <label for="ig_link">Instagram Link:</label>
        <input type="text" class="form-control" id="ig_link" name="ig_link" value="{{ $team_detail->instagram_link }}">
    </div>
    @endif
    <div class="form-group">
        <label for="image">Image:</label>
        <img style="height:250px;width:150px;" id="input-preview" src="{{ isset($team_detail)?asset($team_detail->image):asset('images/upload.jpg') }}">
        <div class="upload-photo">
            <input type="file" name="image" id="input-file-now" class="dropify" />
        </div>
    </div>
    <button class="btn btn-success pull-center" type="submit">Update</button>
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
@endpush
