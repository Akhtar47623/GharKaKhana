@extends('layouts.admin.app')
@section('title','About Us')
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
                        <h5 class="card-title m-b-0 align-self-center">CMS Content</h5>
                        <div class="ml-auto text-light-blue">
                            <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12" role="tablist">
                            </ul>
                        </div>
                    </div>
                    <form action="{{url('/admin/about-us/'.$about_details->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @if($about_details->page_name == 'About Us' && $about_details->page_section == 'About Section')
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$about_details->title}}">
                            </div>
                            @if($about_details->description != null)
                            <div class="form-group">
                                <label for="description">Short Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="3" value="{{$about_details->description}}">{{$about_details->description}}</textarea>
                            </div>
                            @endif
                            @if($about_details->image_path != null)
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <img alt="Image" style="height: 280px;width: 200px;" id="input-preview" src="{{ isset($about_details)?asset($about_details->image_path):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image_path" id="image_path" class="dropify" />
                                </div>
                            </div>
                             @endif
                        @endif
                        @if($about_details->page_name == 'About Us' && $about_details->page_section == 'Info Section')
                            <h3>Mission</h3>
                            @if($about_details->title != null && $about_details->description != null)
                                <div class="form-group">
                                    <label for="description">Title:</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{$about_details->title}}">
                                </div>
                                <div class="form-group">
                                <label for="description">Short Description:</label>
                                    <textarea type="text" class="form-control" id="description" name="description" value="{{$about_details->description}}">{{$about_details->description}}</textarea>
                                </div>
                            @endif
                            @if($about_details->image_path != null)
                            <div class="form-group">
                                <label for="image">Mission Image:</label>
                                <img alt="Website Logo" style="height: 100px;width: 100px;" id="input-preview" src="{{ isset($about_details)?asset($about_details->image_path):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image_path" id="image_path" class="dropify" />
                                </div>
                            </div>
                             @endif
                            <h3>Vision</h3>

                            <div class="form-group">
                                <label for="description">Title:</label>
                                    <input type="text" class="form-control" id="title1" name="title1" value="{{$about_details->title1}}">
                            </div>
                                <div class="form-group">
                                <label for="description">Short Description:</label>
                                    <textarea type="text" class="form-control" id="text1" name="text1" value="{{$about_details->text1}}">{{$about_details->text1}}</textarea>
                            </div>
                            @if($about_details->image1 != null)
                            <div class="form-group">
                                <label for="image">Vission Icon:</label>
                                <img alt="Image" style="height: 100px;width: 100px;" id="input-preview" src="{{ isset($about_details)?asset($about_details->image1):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image1" id="image1" class="dropify" />
                                </div>
                            </div>
                             @endif
                            <h3>Methods</h3>
                            @if($about_details->title2 != null && $about_details->text2 != null)
                                <div class="form-group">
                                    <label for="description">Title:</label>
                                    <input type="text" class="form-control" id="title2" name="title2" value="{{$about_details->title2}}">
                                </div>
                                <div class="form-group">
                                <label for="description">Short Description:</label>
                                    <textarea type="text" class="form-control" id="text2" name="text2" value="{{$about_details->text2}}">{{$about_details->text2}}</textarea>
                                </div>
                            @endif
                            @if($about_details->image2 != null)
                            <div class="form-group">
                                <label for="image">Methods Icon:</label>
                                <img alt="Image" style="height: 100px;width: 100px;" id="input-preview" src="{{ isset($about_details)?asset($about_details->image2):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image2" id="image2" class="dropify" />
                                </div>
                            </div>
                            @endif

                            <br>
                            <h3>Main Info Image</h3>
                            @if($about_details->image3 != null)
                            <div class="form-group">
                                <label for="image">Info Image:</label>
                                <img alt="Image" style="height: 280px;width: 200px;" id="input-preview" src="{{ isset($about_details)?asset($about_details->image3):asset('images/upload.jpg') }}">
                                <div class="upload-photo">
                                    <input type="file" name="image3" id="image3" class="dropify" />
                                </div>
                            </div>
                            @endif
                       
                        @endif                    
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
<script>
    $(document).ready(function(){
        $('#description').summernote({
            tabsize: 2,
            height: 100
        });
        $('#text1').summernote({
            tabsize: 2,
            height: 100
        });
         $('#text2').summernote({
            tabsize: 2,
            height: 100
        });
          $('#text3').summernote({
            tabsize: 2,
            height: 100
        });
    });
</script>
<script src="{{asset('plugins/vendors/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
@endpush



